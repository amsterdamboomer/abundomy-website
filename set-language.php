<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params([
            'path' => '/', 
            'samesite' => 'Lax',
            'secure' => true,    // Protects session drops in modern browsers
            'httponly' => true
        ]);
        session_start();
    }

    // Determine the active language contextual frame
    $currentLang = $_SESSION['form_data']['temp_language'] 
                   ?? $_SESSION['user_lang'] 
                   ?? $_COOKIE['site_lang'] 
                   ?? 'en'; // Default fallback

    // --- INCLUDE YOUR TRANSLATION FILE OR DEFINE t() HERE ---
    // Ensure t() or your dictionary initialization script runs right here, using $currentLang!

    // Determine where to redirect after selection
    $returnTo = $_POST['return_to'] ?? $_GET['from'] ?? $_SERVER['HTTP_REFERER'] ?? 'index.php';
    if (strpos($returnTo, 'set-language.php') !== false) {
        $returnTo = 'index.php';
    }

    // Security Check Adjusted: Allows absolute paths, explicit trusted domains, 
    // or relative framework filenames (like profile.php) while blocking external open redirects.
    if (!preg_match('/^\//', $returnTo) && 
        !preg_match('/^https?:\/\/(localhost|abundomy\.com)/i', $returnTo) && 
        !preg_match('/^(index|profile|transactions|service|signup|reset-password)\.php/i', $returnTo)) {
        
        $returnTo = 'index.php';
    }

    $isTemp = (isset($_GET['temp']) && $_GET['temp'] == 1) || (isset($_POST['is_temp']) && $_POST['is_temp'] == 1);

    // Complete catalog listing of your 71 active system languages
    $languages = [
        "ah" => "አማርኛ Amharic", "ar" => "عربي Arabic", "am" => "Armenian հայկ", 
        "az" => "Azərbaycan", "by" => "беларускі Belarus", "be" => "বাংলা Bengali",
        "bo" => "Bosanski Bosnian", "bg" => "български Bulgaria", "ca" => "廣州話 Cantonese",
        "ch" => "簡體中文 Chinese", "cz" => "čeština Czech", "se" => "Cрпски Serbian",
        "da" => "Dansk", "de" => "Deutsch", "en" => "English", "es" => "Espagnol",
        "fp" => "Filipino", "fr" => "Français", "gu" => "ગુજરાતી Gujarati", "ir" => "Gaeilge Irish",
        "gr" => "ελληνικά Greece", "ha" => "Hausa Nigeria", "he" => "עִברִيت Hebrew",
        "hi" => "हिंदी Hindi", "cr" => "Hrvatski Croatia", "ig" => "Igbo Nigeria",
        "in" => "Indonesia", "ic" => "íslenskur Iceland", "it" => "Italiano",
        "ja" => "日本語 Japanese", "ka" => "қазақ Kazakh", "kh" => "Khmer ខ្မែរ",
        "ki" => "Kinyarwanda", "sh" => "Kiswahili", "co" => "Kituba Congo",
        "ko" => "한국인 Korean", "kg" => "Kyrgyz", "la" => "ພາသာລາວ Lao",
        "lv" => "Latviski Latvia", "lt" => "Lietuvių Lithuania", "hu" => "Magyar Hungary",
        "mg" => "Malagasy", "ma" => "Marathi India", "ml" => "Melayu Malaysia",
        "mo" => "Монгол Mongolia", "bu" => "မြန်မာ Myanmar", "ne" => "Nederlands",
        "np" => "नेपाली Nepal", "no" => "Norsk", "or" => "Oromoo Ethiopia",
        "pa" => "Pashto Afghanistan", "pe" => "Persian", "po" => "Polski", "ps" => "شاہ مکھی Punjabi Shahmukhi",
        "pt" => "Português", "pu" => "ਗੁਰਮੁਖੀ Punjabi Gurmukhi", "ro" => "Română", "ru" => "Русский Russian",
        "zi" => "Setswana Zimbab.", "al" => "Shqiptare Albania", "sl" => "Slovenski Slovenia",
        "sk" => "Slovenský Slovak", "so" => "Soomaali", "fi" => "Suomalainen Fin.",
        "sw" => "Svenska Sweden", "ta" => "தமிழ் Tamil", "th" => "แบบไทย Thailand",
        "vi" => "Tiếng Việt Vietnam", "tu" => "Türkçe", "ur" => "اردو Urdu Pakistan",
        "yo" => "Yoruba Nigeria"
    ];

    // 1. PROCESS POST REQUESTS (From explicit language selection forms)
    if (isset($_POST['language_choice']) && array_key_exists($_POST['language_choice'], $languages)) {
        $selectedLang = $_POST['language_choice'];
        
        if ($isTemp) {
            $_SESSION['form_data']['temp_language'] = $selectedLang;
        } else {
            $_SESSION['user_lang'] = $selectedLang;
            unset($_SESSION['form_data']['temp_language']); // Clear temporary choice if setting permanently

            // Keep cookie valid for 1 year so it survives across logouts
            setcookie('site_lang', $selectedLang, [
                'expires' => time() + (365 * 24 * 60 * 60), 
                'path' => '/',
                'samesite' => 'Lax',
                'secure' => true,
                'httponly' => true
            ]);
        }

        header("Location: " . $returnTo);
        exit();
    }

    // 2. PROCESS GET REQUESTS (If flags are straightforward links: set-language.php?language_choice=ne)
    if (isset($_GET['language_choice']) && array_key_exists($_GET['language_choice'], $languages)) {
        $selectedLang = $_GET['language_choice'];
        
        if ($isTemp) {
            $_SESSION['form_data']['temp_language'] = $selectedLang;
        } else {
            $_SESSION['user_lang'] = $selectedLang;
            unset($_SESSION['form_data']['temp_language']);

            setcookie('site_lang', $selectedLang, [
                'expires' => time() + (365 * 24 * 60 * 60),
                'path' => '/',
                'samesite' => 'Lax',
                'secure' => true,
                'httponly' => true
            ]);
        }

        header("Location: " . $returnTo);
        exit();
    }

    // =========================================================================
    // 3. LOAD APPLICATION SHELL (Only runs if the page is viewed directly)
    // =========================================================================
    $pageTitle = "Language Selector | Abundomy";
    require_once "header.php"; 
?>



<style>
    .rtl-mode { text-align: right !important; }
    .rtl-mode .par, .rtl-mode .par_bold, .rtl-mode .par_italic, .rtl-mode .title3, .rtl-mode .title1, .rtl-mode .imgtext, .rtl-mode .form__label {
        text-align: right !important; width: 100%; display: block;
    }
    .rtl-mode ol, .rtl-mode ul { padding-right: 40px; padding-left: 0; text-align: right; }
    .rtl-mode li { text-align: right; }
    .rtl-mode .blockquote__text { text-align: right !important; }
</style>

<div id="capture-section2" class="selectable-text <?php echo isset($isRTL) && $isRTL ? 'rtl-mode' : ''; ?>" <?php echo isset($isRTL) && $isRTL ? 'dir="rtl"' : 'dir="ltr"'; ?>>

    <div class='field-wrapper'>
        <!-- ENHANCED FORM ACTION PATH TRACKING -->
        <form id="form__language" method="POST" action="set-language.php?temp=<?php echo $isTemp ? '1' : '0'; ?>&from=<?php echo urlencode($returnTo); ?>">
            <input type="hidden" name="return_to" value="<?php echo htmlspecialchars($returnTo); ?>">
            <input type="hidden" name="is_temp" value="<?php echo $isTemp ? '1' : '0'; ?>">
            <input type="hidden" name="language" value="<?php echo htmlspecialchars($currentLang); ?>">

            <div class='button4-row'>
                <div class='button4-column1'></div>
                <div class='button4-column2'></div>
                <div class='button4-column3'>
                    <a href='<?php echo htmlspecialchars($returnTo); ?>'>
                        <button type='button' class='login-button' id='tx_03'><?php echo ($currentLang === 'ne') ? 'Annuleren' : 'Cancel'; ?></button>
                    </a>
                </div>
            </div>
            
            <!-- RESTORED: Label above the input field with original class and styling -->
            <label class='form__label' id='tx_04'><?php echo ($currentLang === 'ne') ? 'Voer taal in' : 'Enter Language'; ?></label>
            <input type='text' class='form__input' id='searchlan' name='searchlan' autocomplete='off' oninput='validateSearch()' value=''>
            <div class='medium_line'></div>

            <div class="language-listbox" id="langList">
                <?php foreach ($languages as $code => $name): 
                    $isChecked = ($currentLang === $code) ? "checked" : "";
                    $flagCode = strtolower($code); 
                    
                    // Direct dynamic image string assignment rule mappings
                    switch ($flagCode) {
                        case 'or': 
                            $flagFile = 'flag_ah.jpg'; 
                            break;
                        case 'ca': 
                            $flagFile = 'flag_ch.jpg'; 
                            break;
                        default:   
                            $flagFile = 'flag_' . $flagCode . '.jpg'; 
                            break;
                    }
                ?>
                    <label class="lang-item" data-searchname="<?php echo htmlspecialchars(strtolower($name), ENT_QUOTES, 'UTF-8'); ?>">
                        <input type="radio" name="language_choice" value="<?php echo htmlspecialchars($code); ?>" 
                               onclick="this.form.submit()" <?php echo $isChecked; ?>>
                        <div class="lang-content">
                            <div class="flag-container">
                                <span class="flag-crop-container page-list-flag">
                                    <img src="<?php echo htmlspecialchars($baseHref); ?>img/<?php echo $flagFile; ?>" alt="<?php echo htmlspecialchars($name); ?> Flag" class="flag-img-round">
                                </span>
                            </div>
                            <span class="lang-text"><?php echo htmlspecialchars($name); ?></span>
                        </div>
                    </label>
                <?php endforeach; ?>
            </div>
        </form>
    </div>
</div>




<script>
    function validateSearch() {
        const query = document.getElementById('searchlan').value.toLowerCase();
        const items = document.querySelectorAll('.lang-item');
        
        items.forEach(item => {
            const langName = item.getAttribute('data-searchname');
            if (langName.includes(query)) {
                item.style.display = "block";
            } else {
                item.style.display = "none";
            }
        });
    }
    const currentLang = "<?php echo $currentLang; ?>";
</script>

