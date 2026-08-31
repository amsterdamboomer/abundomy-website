<?php 
    // =========================================================================
    // STEP 1: PRE-LOAD MULTI-LINGUAL SEO METADATA & ARRAYS
    // =========================================================================
    $projectRoot = str_replace('\\', '/', dirname(__FILE__));
    
    if (session_status() === PHP_SESSION_NONE) { session_start(); }
    $seoLang = $_SESSION['user_lang'] ?? $_COOKIE['site_lang'] ?? 'en';

    // Target the main education page dictionary first
    $jsonPath = $projectRoot . "/json/education.json";
    $fallbackTitle = "Education"; 
    $fallbackBrand = "Abundomy";  

    if (file_exists($jsonPath)) {
        $jsonData = json_decode(file_get_contents($jsonPath), true);
        $fallbackTitle = $jsonData[$seoLang]['tx_02'] ?? $jsonData['en']['tx_02'] ?? $fallbackTitle;
        $fallbackBrand = $jsonData[$seoLang]['tx_01'] ?? $jsonData['en']['tx_01'] ?? $fallbackBrand;
    }

    $pageTitle = $fallbackTitle . " | " . $fallbackBrand;
    $pageDesc = "Explore the " . $fallbackTitle . " resources provided by " . $fallbackBrand . ".";

    // =========================================================================
    // STEP 2: DYNAMICALLY WEAVE ARTICLE TITLES INTO KEYWORDS
    // =========================================================================
    // Base keywords for the educational section
    $keywordArray = ["Economic Education", "Learning Resources", "Research Papers", "Academic Reform", "Macroeconomic Study", "Free Knowledge"];

    // Target specific translation IDs present inside your index/education shared dictionary files
    // If these keys exist in your education.json or index.json file, we pull them on the fly
    $articleKeys = [
        'tx_105', 'tx_101', 'tx_102', 'tx_103', 'tx_104', // Videos
        'tx_31', 'tx_32', 'tx_33', 'tx_34', 'tx_35', 'tx_36', 'tx_37', 'tx_38', 'tx_39', 'tx_40',
        'tx_41', 'tx_42', 'tx_43', 'tx_44', 'tx_45', 'tx_46', 'tx_47', 'tx_48', 'tx_49', 'tx_50',
        'tx_51', 'tx_52', 'tx_53', 'tx_54', 'tx_55', 'tx_56', 'tx_57', 'tx_58', 'tx_59', 'tx_60', 'tx_61'
    ];

    if (isset($jsonData[$seoLang])) {
        foreach ($articleKeys as $key) {
            if (!empty($jsonData[$seoLang][$key])) {
                $keywordArray[] = trim($jsonData[$seoLang][$key]);
            } elseif (!empty($jsonData['en'][$key])) {
                $keywordArray[] = trim($jsonData['en'][$key]);
            }
        }
    }

    // Convert the calculated array into a clean comma-separated string for the meta tag
    $pageKeywords = implode(', ', array_unique($keywordArray));

    // =========================================================================
    // STEP 3: LOAD MASTER SYSTEM FRAMEWORK
    // =========================================================================
    include_once "header.php"; 
?>


<style>
    /* 1. Ensure the main container enforces right alignment for RTL */
    .rtl-mode {
        text-align: right !important;
    }

    /* 2. Force all paragraph types to align right in RTL mode */
    .rtl-mode .par, 
    .rtl-mode .par_bold, 
    .rtl-mode .par_italic,
    .rtl-mode .imgtext,
    .rtl-mode .form__label,
    .rtl-mode .title3,
    .rtl-mode .title1 {
        text-align: right !important;
        width: 100%;
        display: block;
    }

    /* 3. Handle list items specifically for RTL */
    .rtl-mode ol, .rtl-mode ul {
        padding-right: 40px; /* Moves numbers/bullets to the right side */
        padding-left: 0;
        text-align: right;
    }

    .rtl-mode li {
        text-align: right;
    }

    /* 4. Ensure the blockquote text inside the RTL container aligns right */
    .rtl-mode .blockquote__text {
        text-align: right !important;
    }
</style>

<div class="top-title-container <?php echo $isRTL ? 'rtl-mode' : ''; ?>">
    <span class='top-title' id='tx_01'>Abundomy</span>
</div>
<div id="capture-section" class="selectable-text <?php echo $isRTL ? 'rtl-mode' : ''; ?>" <?php echo $isRTL ? 'dir="rtl"' : 'dir="ltr"'; ?>>
    <span class='title1' id='tx_02'>Education</span><br>

    <p class="par" id="tx_03">The most important step we need to take to get to a world of abundance is to educate ourselves about how our current world really works. To change anything, we need to understand how the current system is holding all of us back and tries to keep us ignorant about how everyone is exploited.</p>
    <p class="par" id="tx_04">To step out of our life-long indoctrination, it is important to read relevant books and articles and view educational video's that explain what is exactly wrong in our world, and what we can do to change it. You will be amazed how knowledge is the only key that will set all of us free.</p>
    <span class='title3' id='tx_05'>Books</span>
    <ol>
        <li><p class='par'><a href='quicktour.php' class='link'>Quick Tour</a></p></li>
<!--        <li><p class='par'><a href='articles/abundomy-1.4-summary-reader.php' class='link' id='tx_06'>Abundomy 1.4 (summary)</a></p></li>
         <li><p class='par'><a href='articles/abundomy.php' class='link' id='tx_07'>Abundomy 1.4</a></p></li>
        <li><p class='par'><a href='articles/creature.php' class='link' id='tx_08'>The Creature From Jeckyll Island</a></p></li>
        <li><p class='par'><a href='articles/bloodlines.php' class='link' id='tx_09'>Worldwide Evil and Misery</a></p></li>
 -->    </ol><br>
    <span class='title3' id='tx_100'>Youtube Videos</span>
    <ol>
        <li><p class='par'><a href='articles/youtube05.php' class='link' id='tx_105'>The Abundomy Vision</a></p></li>
        <li><p class='par'><a href='articles/youtube01.php' class='link' id='tx_101'>Banks versus 1CoinH</a></p></li>
        <li><p class='par'><a href='articles/youtube02.php' class='link' id='tx_102'>Teun at Weltschmerz</a></p></li>
        <li><p class='par'><a href='articles/youtube03.php' class='link' id='tx_103'>Teun at Potkaars</a></p></li>
        <li><p class='par'><a href='articles/youtube04.php' class='link' id='tx_104'>Teun at Economy 2.0</a></p></li>
    </ol><br>
    <span class='title3' id='tx_30'>Articles</span>
    <ol>
        <li><p class='par'><a href='articles/article01-reader.php' class='link' id='tx_31'>An introduction to "Ethical Money"</a></p></li>
        <li><p class='par'><a href='articles/article02-reader.php' class='link' id='tx_32'>The Root Of All Evil</a></p></li>
        <li><p class='par'><a href='articles/article03-reader.php' class='link' id='tx_33'>Why Our Current Money Doesn't Work</a></p></li>
        <li><p class='par'><a href='articles/article04-reader.php' class='link' id='tx_34'>Self Sovereign Identity</a></p></li>
        <li><p class='par'><a href='articles/article05-reader.php' class='link' id='tx_35'>The 2 Monopolies of Central Banks</a></p></li>
        <li><p class='par'><a href='articles/article06-reader.php' class='link' id='tx_36'>Free Local Economies</a></p></li>
        <li><p class='par'><a href='articles/article07-reader.php' class='link' id='tx_37'>Why Demurrage?</a></p></li>
        <li><p class='par'><a href='articles/article08-reader.php' class='link' id='tx_38'>What is wrong with cryptocurrencies?</a></p></li>
        <li><p class='par'><a href='articles/article09-reader.php' class='link' id='tx_39'>The Banking Exodus</a></p></li>
        <li><p class='par'><a href='articles/article10-reader.php' class='link' id='tx_40'>Game Over For Government Corruption</a></p></li>
        <li><p class='par'><a href='articles/article11-reader.php' class='link' id='tx_41'>Money Islands</a></p></li>
        <li><p class='par'><a href='articles/article12-reader.php' class='link' id='tx_42'>Revive science</a></p></li>
        <li><p class='par'><a href='articles/article13-reader.php' class='link' id='tx_43'>The Return of the Stolen Property</a></p></li>
        <li><p class='par'><a href='articles/article14-reader.php' class='link' id='tx_44'>From Bankers to Corona</a></p></li>
        <li><p class='par'><a href='articles/article15-reader.php' class='link' id='tx_45'>The Pyramid Scheme of Money and Interest</a></p></li>
        <li><p class='par'><a href='articles/article16-reader.php' class='link' id='tx_46'>Don't Try To Stop This Crude Carrier!</a></p></li>
        <li><p class='par'><a href='articles/article17-reader.php' class='link' id='tx_47'>Design of the Plan</a></p></li>
        <li><p class='par'><a href='articles/article18-reader.php' class='link' id='tx_48'>How to Leave the System</a></p></li>
        <li><p class='par'><a href='articles/article19-reader.php' class='link' id='tx_49'>Let's change the Universal Declaration of Human Rights</a></p></li>
        <li><p class='par'><a href='articles/article20-reader.php' class='link' id='tx_50'>Universal Declaration of Human Rights</a></p></li>
        <li><p class='par'><a href='articles/article21-reader.php' class='link' id='tx_51'>Grab Your Once in a Lifetime Opportunity!</a></p></li>
        <li><p class='par'><a href='articles/article22-reader.php' class='link' id='tx_52'>Vote Harder!</a></p></li>
        <li><p class='par'><a href='articles/article23-reader.php' class='link' id='tx_53'>Jail A Monopoly</a></p></li>
        <li><p class='par'><a href='articles/article24-reader.php' class='link' id='tx_54'>Jail Another Monopoly</a></p></li>
        <li><p class='par'><a href='articles/article25-reader.php' class='link' id='tx_55'>Prepare For Financial Harakiri</a></p></li>
        <li><p class='par'><a href='articles/article26-reader.php' class='link' id='tx_56'>Talking In Nations</a></p></li>
        <li><p class='par'><a href='articles/article27-reader.php' class='link' id='tx_57'>Better Universal Human Rights for a Better World</a></p></li>
        <li><p class='par'><a href='articles/article28-reader.php' class='link' id='tx_58'>Will The War With Iran Wake Up People?</a></p></li>
        <li><p class='par'><a href='articles/article29-reader.php' class='link' id='tx_59'>Amazing: 2 Wars Ended In One Day</a></p></li>
        <li><p class='par'><a href='articles/article30-reader.php' class='link' id='tx_60'>What Abundomy can do for Farmers and Fishermen</a></p></li>
        <li><p class='par'><a href='articles/article31-reader.php' class='link' id='tx_61'>Abundomy 2030 Judgement Day</a></p></li>
        <li><p class='par'><a href='articles/article32-reader.php' class='link' id='tx_62'>Geopolitics</a></p></li>
        <li><p class='par'><a href='articles/article33-reader.php' class='link' id='tx_63'>Abundomy. In as little words as possible</a></p></li>
        <li><p class='par'><a href='articles/article34-reader.php' class='link' id='tx_64'>Focus. How to walk away from the current economy</a></p></li>
        <li><p class='par'><a href='articles/article35-reader.php' class='link' id='tx_65'>What is IPFS?</a></p></li>
    </ol><br>
    <a href="#top1"><button type="button" class="login-button" id="totop">BACK TO TOP</button></a><br><br>
</div>
<script>
    const currentLang = "<?php echo $currentLang; ?>";

    async function loadArticle() {
        const overlay = document.getElementById('loading-overlay');
        const msg = document.getElementById('loader-msg');
        
        try {
            // Update the message so you know the script is working
            if (msg) msg.innerHTML = "Loading... ...";

            const response = await fetch('<?php echo $baseHref; ?>json/education.json');
            const data = await response.json();
            const content = data[currentLang] || data['en'];

            for (const [id, text] of Object.entries(content)) {
                const el = document.getElementById(id);
                if (el) {
                    el.innerHTML = text; 
                }
            }
        } catch (e) {
            console.error("Error loading article:", e);
            if (msg) msg.innerHTML = "Error loading content.";
        } finally {
            const overlay = document.getElementById('loading-overlay');
            const content = document.getElementById('capture-section');

            if (overlay) overlay.style.display = 'none';   // Remove Dark Blue Screen
            if (content) content.style.display = 'block';  // Show Finished Webpage
        }
    }

    loadArticle();

    // Emergency fallback: Hide loader after 5 seconds if still visible
    setTimeout(() => {
        const overlay = document.getElementById('loading-overlay');
        if (overlay && !overlay.classList.contains('loader-hidden')) {
            overlay.classList.add('loader-hidden');
        }
    }, 5000);

</script>

<?php include_once "footer.php"; ?>
</body>
</html>