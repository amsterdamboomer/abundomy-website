<?php
    //=====================  DEBUG LINES ===================================
    echo "<style>* { user-select: text !important; -webkit-user-select: text !important; }</style>";
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    //======================================================================

    ob_start();

    // 1. System Path (For PHP includes)
    $projectRoot = str_replace('\\', '/', dirname(__FILE__));

    // 2. Web Path (For Images)
    if ($_SERVER['HTTP_HOST'] === 'localhost') {
        $baseHref = "/abundomy-money-git/"; 
    } else {
        $baseHref = "/";
    }

    // 2. Adjust require_once to use absolute server paths
    require_once $projectRoot . "/includes/dbh.inc.php";
    require_once $projectRoot . "/includes/functions2.inc.php"; 

    // 3. Language settings
    $supportedLangs = ['ah','ar','am','az','by','be','bo','bg','ca','ch','cz','se','da','de','en','es','fp','fr','gu','ir','gr','ha','he','hi','cr','ig','in','ic','it','ja','ka','kh','ki','sh','co','ko','kg','la','lv','lt','hu','mg','ma','ml','mo','bu','ne','np','no','or','pa','pe','po','ps','pt','pu','ro','ru','zi','al','sl','sk','so','fi','sw','ta','th','vi','tu','ur','yo'];

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $currentLang = $_SESSION['user_lang'] ?? $_COOKIE['site_lang'] ?? detectBestLanguage($supportedLangs, 'en');

    // 4. BRAND NAME PORTMANTEAU MAP
    $nameMap = array(
        'ah' => 'ትርфኖሚ', 'ar' => 'وفراقتصاد', 'am' => 'Առатնտেস', 'az' => 'Boliqtisad',
        'by' => 'Дабраноміка', 'be' => 'പ്രчুরনীতি', 'bo' => 'Izonomija', 'bg' => 'Изономика',
        'ca' => '豐盛濟', 'ch' => '丰盛济', 'cz' => 'Hojnomika', 'se' => 'Изономија',
        'da' => 'Overflomi', 'de' => 'Abundomie', 'en' => 'Abundomy', 'es' => 'Abundomia',
        'fp' => 'Kasagonomiya', 'fr' => 'Abondomie', 'gu' => 'અર્થવિપુલતા', 'ir' => 'Flúirseagar', 'gr' => 'Αφθονομία',
        'ha' => 'Yalwan-Arziki', 'he' => 'שפעכله', 'hi' => 'प्रचुरवार्ता', 'cr' => 'Izonomija',
        'ig' => 'Ụbanomiya', 'in' => 'Limpahnomi', 'ic' => 'Snægtarhag', 'it' => 'Abbondomia',
        'ja' => '豊経済', 'ka' => 'Molnomika', 'kh' => 'ផលសេដ្ឋ', 'ki' => 'Abundomy',
        'sh' => 'Ukwachumi', 'co' => 'Bimvwanomi', 'ko' => '풍경', 'kg' => 'Kennomika',
        'la' => 'ຮ່ວມເສດຖາ', 'lv' => 'Bagātnomika', 'lt' => 'Gausonomika', 'hu' => 'Bőséggazda',
        'mg' => 'Hafarekarena', 'ma' => 'विपुलशास्त्र', 'ml' => 'Limpahnomi', 'mo' => 'Элбэгзасаг',
        'bu' => 'ကျယ်စီးပွား', 'ne' => 'Abundomie', 'np' => 'प्रचुरशास्त्र', 'no' => 'Overflomi',
        'or' => 'Badhaadagdee', 'pa' => 'پریمانیساد', 'pe' => 'فراوانید', 'po' => 'Obfitonomia', 'ps' => 'اِقتصادیَت',
        'pt' => 'Abundomia', 'pu' => 'ਆਰਥਿਕ-ਭਰਪੂਰਤਾ', 'ro' => 'Abundențonomia', 'ru' => 'Изобиломика', 'zi' => 'Letlotlonomi',
        'al' => 'Bollëkonomi', 'sl' => 'Izonomija', 'sk' => 'Hojnomika', 'so' => 'Barwaaqalaha',
        'fi' => 'Runstalous', 'sw' => 'Överflomi', 'ta' => 'வளதாரம்', 'th' => 'มั่งเศรษฐา',
        'vi' => 'Doi-kinhte', 'tu' => 'Bolnomi', 'ur' => 'فرامعیش', 'yo' => 'Ọpọlowo'
    );

    // --- GLOBAL VISITOR METRICS INITIALIZATION (Crash-Proof) ---
    $totalWebVisits = 0; 

    if (isset($conn) && $conn instanceof mysqli) {
        try {
            $vResult = mysqli_query($conn, "SELECT total_visits FROM visitor_stats WHERE stat_id = 1");
            if ($vResult) {
                $vStats = mysqli_fetch_assoc($vResult);
                $totalWebVisits = $vStats['total_visits'] ?? 0;
            }
        } catch (Exception $e) {
            $totalWebVisits = 0; 
        }
    }
    // --- DETERMINE READ DIRECTION GLOBALLY ---
    $rtlLangs = array('ar', 'he', 'fa', 'ur', 'pa', 'pe', 'ps');
    $isRTL = in_array($currentLang, $rtlLangs);
    $dirAttribute = $isRTL ? 'dir="rtl"' : 'dir="ltr"';
?>
<!DOCTYPE html>
<html lang="<?php echo $currentLang; ?>" <?php echo (isset($isRTL) && $isRTL) ? 'dir="rtl"' : 'dir="ltr"'; ?>>

<head>
    <title><?php echo isset($pageTitle) ? $pageTitle : "Abundomy"; ?></title>
    
    <!-- FIX: Only ONE meta description row exists now to avoid search indexing conflicts -->
    <meta name="description" content="<?php echo isset($pageDesc) ? htmlspecialchars($pageDesc) : 'Abundomy - Realizing Resource Systems'; ?>">

    <?php if (basename($_SERVER['PHP_SELF']) === 'set-language.php'): ?>
        <!-- Instructs all indexing spiders to safely skip tracking this processing template -->
        <meta name="robots" content="noindex, nofollow" />
    <?php endif; ?>
    <!-- Dynamic Keywords for global indexing visibility -->
    <meta name="keywords" content="Abundomy, <?php echo isset($pageKeywords) ? htmlspecialchars($pageKeywords) : 'Resource Systems, Local Economy, Alternative Currency, Isonomy, Economic Reform'; ?>">
    <meta name="author" content="Teun van Sambeek">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>      
    
    <link rel="icon" href="<?php echo $baseHref; ?>img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseHref; ?>css/reset.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseHref; ?>css/main.css">

    <!-- Open Graph Protocol Core Parameters -->
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo isset($pageTitle) ? $pageTitle : 'Abundomy'; ?>" />
    <meta property="og:description" content="<?php echo isset($pageDesc) ? htmlspecialchars($pageDesc) : 'Abundomy - Realizing Resource Systems'; ?>" />
    <meta property="og:url" content="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" />
    
    <!-- THE FIX: We explicitly force a full absolute URL for the preview image -->
    <meta property="og:image" content="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . $baseHref; ?>img/Abundomy_Money_App_300x425.png" />


    <!-- International SEO Cross-Linking Mapping Loop -->
    <link rel="alternate" href="<?php echo $baseHref; ?>index.php?lang=en" hreflang="x-default" />
    <?php
        foreach ($supportedLangs as $langCode) {
            // Converts internal language flags to standard search codes
            $seoLang = ($langCode === 'ah') ? 'am' : (($langCode === 'ch') ? 'zh' : $langCode);
            echo '<link rel="alternate" href="' . $baseHref . 'index.php?lang=' . $langCode . '" hreflang="' . $seoLang . '" />' . "\n";
        }
    ?>
</head>
<body>
    <a name="top1"></a>

    <div id="loading-overlay" class="loader-wrapper">
        <div class="loader"></div>
        <div class="loader-text" id="loader-msg">Loading...</div>
    </div>   
    <div class="full-width-header-wrapper2">
        <div class="header-content">
            <header class='header-main2'>
                <a href="<?php echo $baseHref; ?>index.php" class="nav-item" tabindex="-1">
                    <img src="<?php echo $baseHref; ?>img/Home_70x70.png" alt="Home">
                </a>
                <a href="<?php echo $baseHref; ?>base.php" class="nav-item" tabindex="-1">
                    <img src="<?php echo $baseHref; ?>img/Abundomy_Logo.gif" class="rotating-world" alt="World">
                </a>
                <a href="<?php echo $baseHref; ?>projects.php" class="nav-item" tabindex="-1">
                    <img src="<?php echo $baseHref; ?>img/Projects_70x70.png" alt="Projects">
                </a>
                <a href="<?php echo $baseHref; ?>education.php" class="nav-item" tabindex="-1">
                    <img src="<?php echo $baseHref; ?>img/Books_70x70.png" alt="Partners">
                </a>
                <a href="<?php echo $baseHref; ?>community.php" class="nav-item" tabindex="-1">
                    <img src="<?php echo $baseHref; ?>img/Community_70x70.png" alt="Community">
                </a>

                <!-- Language Icon - Updated with comprehensive 71-language map -->
                <div class="header-lang">
                    <a href="<?php echo $baseHref; ?>set-language.php?redirect=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" class="lang-icon" tabindex="-1">
                        <?php 
                            $flagCode = strtolower($currentLang); 
                            
                            switch ($flagCode) {
                                // Linked cases from your original script rules
                                case 'or': 
                                    $flagFile = 'flag_ah.jpg'; 
                                    break;
                                case 'ca': 
                                    $flagFile = 'flag_ch.jpg'; 
                                    break;
                                
                                // Explicit mapping for clarity across all 71 provided codes
                                case 'ah': case 'ar': case 'am': case 'az': case 'by': 
                                case 'be': case 'bo': case 'bg': case 'ch': case 'cz': 
                                case 'se': case 'da': case 'de': case 'en': case 'es': 
                                case 'fp': case 'fr': case 'gu': case 'ir': case 'gr': case 'ha': 
                                case 'he': case 'hi': case 'cr': case 'ig': case 'in': 
                                case 'ic': case 'it': case 'ja': case 'ka': case 'kh': 
                                case 'ki': case 'sh': case 'co': case 'ko': case 'kg': 
                                case 'la': case 'lv': case 'lt': case 'hu': case 'mg': 
                                case 'ma': case 'ml': case 'mo': case 'bu': case 'ne': 
                                case 'np': case 'no': case 'pa': case 'pe': case 'po': case 'ps':
                                case 'pt': case 'pu': case 'ro': case 'ru': case 'zi': case 'al': 
                                case 'sl': case 'sk': case 'so': case 'fi': case 'sw': 
                                case 'ta': case 'th': case 'vi': case 'tu': case 'ur': 
                                case 'yo':
                                default:
                                    $flagFile = 'flag_' . $flagCode . '.jpg';
                                    break;
                            }
                        ?>
                        <span class="flag-crop-container">
                            <img src="<?php echo $baseHref; ?>img/<?php echo $flagFile; ?>" alt="Language Flag" class="flag-img-round">
                        </span>


                    </a>
                </div>
            </header>

        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Create a hidden, tiny dummy element to "catch" the focus
            const focusCatcher = document.createElement('div');
            focusCatcher.style.cssText = "position:fixed; top:0; left:0; width:1px; height:1px; opacity:0; pointer-events:none;";
            focusCatcher.setAttribute('tabindex', '0');
            document.body.appendChild(focusCatcher);

            // Check if header exists before attaching events
            const header = document.querySelector('.header-main');
            if (header) {
                window.addEventListener('focus', function() {
                    if (document.activeElement && header.contains(document.activeElement)) {
                        focusCatcher.focus();
                    }
                });

                header.addEventListener('mousedown', function(e) {
                    if (!e.target.closest('a')) {
                        e.preventDefault();
                        focusCatcher.focus();
                    }
                });
            }
        });
    </script>
