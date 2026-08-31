<?php 

    // =========================================================================
    // STEP 1: PRE-LOAD MULTI-LINGUAL SEO METADATA (BEFORE HEADER EXECUTIONS)
    // =========================================================================
    $projectRoot = str_replace('\\', '/', dirname(__FILE__));
    
    if (session_status() === PHP_SESSION_NONE) { session_start(); }
    $seoLang = $_SESSION['user_lang'] ?? $_COOKIE['site_lang'] ?? 'en';

    $jsonPath = $projectRoot . "/json/index.json";
    $fallbackTitle = "Home"; 
    $fallbackDesc = "Abundomy - Realizing Resource Systems";

    if (file_exists($jsonPath)) {
        $jsonData = json_decode(file_get_contents($jsonPath), true);
        // tx_01 isolates your Page Title, tx_02 isolates your Landing Description text strings
        $fallbackTitle = $jsonData[$seoLang]['tx_01'] ?? $jsonData['en']['tx_01'] ?? $fallbackTitle;
        $fallbackDesc = $jsonData[$seoLang]['tx_02'] ?? $jsonData['en']['tx_02'] ?? $fallbackDesc;
    }

    $pageTitle = $fallbackTitle . " | Abundomy";
    $pageDesc = htmlspecialchars($fallbackDesc, ENT_QUOTES, 'UTF-8');
    
    // THE METADATA ADDITION: Custom key-phrases tailored explicitly for your homepage layout
    $pageKeywords = "Alternative Money, Financial Freedom, Free Economy, Economic Justice, Multi-lingual Portal";

    // =========================================================================
    // STEP 2: LOAD MASTER SYSTEM FRAMEWORK
    // =========================================================================
    include_once "header.php";

    // =========================================================================
    // STEP 3: PLATFORM CORE RUNTIME & TRACKING LOGIC (AFTER HEADER ACCESSIBILITY)
    // =========================================================================
    
    // Special languages list
    $special_list = ['ar', 'ch', 'de', 'es', 'fr', 'ki', 'ne', 'pt', 'pu', 'ru'];
    $is_special = in_array($currentLang, $special_list);

    // Social Links references
    $en_wa_main = $social_links['en']['wa'] ?? '';
    $en_wa_chat = $social_links['en']['wac'] ?? '';
    $en_tg_main = $social_links['en']['tg'] ?? '';
    $en_tg_chat = $social_links['en']['tgc'] ?? '';

    // Determine book and language code for tracking
    $displayBook = $book_list[$currentLang] ?? $book_list['en'];  
    $bookLangCode = isset($book_list[$currentLang]) ? $currentLang : 'en';

    // Fetch stats for the display (using the 2-char code for the specific book count)
    $stats = ['total' => 0, $bookLangCode => 0]; // Default safe mapping array
    if (isset($conn) && $conn instanceof mysqli) {
        $statsQuery = "SELECT total, `$bookLangCode` FROM downloads WHERE did = 1";
        $statsResult = mysqli_query($conn, $statsQuery);
        if ($statsResult) {
            $stats = mysqli_fetch_assoc($statsResult) ?? $stats;
        }
    }

    // // Identify RTL Languages
    // $rtlLangs = array('ah', 'ar', 'he', 'fa', 'ur', 'pa', 'pe');
    // $isRTL = in_array($currentLang, $rtlLangs);
    // $dirAttribute = $isRTL ? 'dir="rtl"' : 'dir="ltr"';

    // --- HOME PAGE VISITOR LOGGING (Crash-Proof Wrapper) ---
    $isLocalhost = in_array($_SERVER['REMOTE_ADDR'] ?? '', ['127.0.0.1', '::1']) || ($_SERVER['HTTP_HOST'] ?? '') === 'localhost';

    if (!$isLocalhost && isset($conn) && $conn instanceof mysqli) {
        try {
            $updateQuery = mysqli_query($conn, "UPDATE visitor_stats SET total_visits = total_visits + 1 WHERE stat_id = 1");
            
            if ($updateQuery) {
                $totalWebVisits++;
                
                $browserLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? 'en', 0, 2);
                $detectedCountry = strtoupper($browserLang);

                $countryMapping = [
                    'NL' => 'Netherlands', 'BE' => 'Belgium', 'DE' => 'Germany', 
                    'FR' => 'France', 'ES' => 'Spain', 'GB' => 'United Kingdom', 
                    'US' => 'United States', 'AR' => 'Arabic Region', 'RU' => 'Russia'
                ];
                $countryName = $countryMapping[$detectedCountry] ?? 'Other / Unknown';

                $safeCode = mysqli_real_escape_string($conn, $detectedCountry);
                $safeName = mysqli_real_escape_string($conn, $countryName);

                $insertQuery = "INSERT INTO country_stats (country_code, country_name, visit_count) 
                                VALUES ('$safeCode', '$safeName', 1) 
                                ON DUPLICATE KEY UPDATE visit_count = visit_count + 1";
                                
                mysqli_query($conn, $insertQuery);
            }
        } catch (Exception $e) {
            // Silently ignore any database table or structure errors during logging
        }
    }
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


<!-- batch 2     -->
<div class="top-title-container <?php echo $isRTL ? 'rtl-mode' : ''; ?>">
    <span class='top-title' id='tx_01'>Home</span>
</div>

<div id="capture-section" class="selectable-text <?php echo $isRTL ? 'rtl-mode' : ''; ?>" <?php echo $isRTL ? 'dir="rtl"' : 'dir="ltr"'; ?>>


    <!-- Page Title & Cancel Action -->
    <span class="title1" id='tx_02'>Abundomy</span>
<!--     <div style="display: flex; justify-content: flex-end; width: 100%;">
        <a href='https://ipfs.io/ipfs/QmSkjJ4MM6XAWf6YMMHKJbDvcqJVdXYFqi8CPLeRgKJtG8' target='_blank' ><button type='button' class='login-button'>IPFS</button></a>
    </div>
 -->    <div class='centerContainer'>
        <div class='full_line'></div>

        <!-- Book Download Section -->
        <section class="content-section">
             <!-- Updated Link -->
            <a href="download/<?php echo $displayBook['pdf']; ?>" 
               id="download-link-text"
               target="_blank" 
               download 
               onclick="handleDownloadStart(event, '<?php echo $bookLangCode; ?>')">
                <span class="feedback3" id='tx_03'>Download the Abundomy book</span>
            </a>

            <div class="image-wrap">
                <!-- Updated Image Link -->
                <a href="download/<?php echo $displayBook['pdf']; ?>" 
                   id="download-link-img"
                   target="_blank" 
                   download 
                   onclick="handleDownloadStart(event, '<?php echo $bookLangCode; ?>')">
                    <img class="book-image" src="img/<?php echo $displayBook['img']; ?>" alt="Abundomy Book Cover">
                </a>
            </div>

            <!-- Stats Display -->
            <p class="feedback4">
                <span>
                    <span id='tx_04'>Downloads</span><span>: </span><span id="total-count"><?php echo ($stats['total'] ?? 0); ?></span> (<span id="lang-count"><?php echo ($stats[$bookLangCode] ?? 0); ?></span>)
                </span>
            </p>
        </section>

        <!-- Animated Progress Overlay Popup Box -->
        <div id="download-progress-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.85); z-index: 99999; justify-content: center; align-items: center; font-family: sans-serif;">
            <div style="background: #111e38; border: 2px solid var(--text, #916B01); padding: 30px; border-radius: 12px; width: 85%; max-width: 380px; text-align: center; box-shadow: 0 10px 25px rgba(0,0,0,0.5);">
                <div style="font-size: 40px; margin-bottom: 15px; animation: bounce 1.5s infinite;">⏳</div>
                <h4 style="margin: 0 0 10px 0; color: #fff; font-size: 18px;" id="progress-title">Preparing Download...</h4>
                <p style="margin: 0 0 20px 0; color: #ccc; font-size: 13px;" id="tx_20">Please wait, your mobile device will notify you when the file transfer finishes.</p>
                
                <!-- Progress Bar Background Wrapper -->
                <div style="width: 100%; background: rgba(255,255,255,0.1); height: 12px; border-radius: 6px; overflow: hidden; border: 1px solid rgba(255,255,255,0.2);">
                    <div id="simulated-progress-bar" style="width: 0%; height: 100%; background: linear-gradient(90deg, #916B01, #dfaf27); transition: width 0.1s linear; border-radius: 6px;"></div>
                </div>
                <div id="progress-percentage-text" style="color: var(--text, #916B01); font-weight: bold; margin-top: 8px; font-size: 14px;">0%</div>
            </div>
        </div>

        <style>
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }
        </style>

        <div class='full_line'></div>
        <div class='medium_line'></div>

        <!-- Money App Section -->

        <section class="content-section">
            <a href='index2.php'>
                <span class='feedback3' id='tx_05'>Use the Abundomy Money App</span>
            </a>
            <div class="image-wrap">
                <a href='index2.php'>
                    <img class="book-image" src="img/Abundomy_Money_App_300x425.png" alt="Abundomy Money App">
                </a>
            </div>
        </section><br>

        <!-- Zeitgeist -->
        <section class="media-section tight-spacing">
            <span class="feedback4" id='tx_06'>The Abundomy Vision</span>
            <div class="image-wrap">
                <a href='https://youtu.be/UNtq9OL98JE?si=FafA9QKZs3Tj1trc' target='_blank'>
                    <img class="Weltschmerz-image" src="img/ZeitgeistClip Thumbnail 500x280.jpg" alt="Zeitgeist">
                </a>
            </div>
        </section>


        <!-- Media & Support Section -->
        <section class="media-section">
            <div class="image-wrap">
                <a href='https://youtu.be/I1kDLFvYJRc' target='_blank'>
                    <img class="Weltschmerz-image" src="img/Weltschmerz_450x250.jpg" alt="Weltschmerz">
                </a>
            </div>
            <div class="image-wrap">
                <a href='https://buymeacoffee.com/teunvansambeek' target='_blank'><img class="coffee-image" src="img/BuyMeACoffee_499x140.png" style="margin-left: clamp(8px, 2.78vw, 16px);" alt="Buy Me A Coffee"></a>
            </div>
        </section>


        <!-- Bottom Icons Section -->
        <section class="footer-icons">
            <p class="tight">
                <a href='https://www.youtube.com/channel/UCXmYF7Qtl-NXt0pRzoLfVWA' target='_blank'>
                    <img class="WT-image" src="img/YouTube_Icon_70x70.png" alt="YouTube">
                </a> 
                <a href='https://www.tiktok.com/@abundomy' target='_blank'>
                    <img class="WT-image" src="img/TikTok_Icon_70x70.png" alt="TikTok">
                </a> 
            </p>
        </section>
    </div> <!-- End field-wrapper -->
</div> <!-- End Centercontainer -->



<!-- batch 5 -->
<script>
    // Global variable tracking download state to block accidental duplicate click counts
    let isDownloading = false;

    function handleDownloadStart(event, lang) {
        // Exit block immediately if user taps the download triggers multiple times
        if (isDownloading) {
            event.preventDefault();
            return false;
        }
        
        isDownloading = true;
        
        // 1. Trigger historical counter update engine immediately on front-end UI and DB
        sendTracking(lang);
        
        // 2. Access presentation layout elements
        const overlay = document.getElementById('download-progress-overlay');
        const bar = document.getElementById('simulated-progress-bar');
        const pctText = document.getElementById('progress-percentage-text');
        const titleText = document.getElementById('progress-title');
        
        if (overlay) overlay.style.display = 'flex';
        
        // 3. Initiate incremental progress animation loop ticker
        let currentWidth = 0;
        const trackingInterval = setInterval(() => {
            if (currentWidth < 75) {
                currentWidth += Math.floor(Math.random() * 4) + 1; // Snappy up to 75%
            } else if (currentWidth < 96) {
                currentWidth += 0.5; // Slowly crawls towards 96% to simulate server hand-shake delays
            }
            
            if (bar) bar.style.width = currentWidth + '%';
            if (pctText) pctText.textContent = Math.floor(currentWidth) + '%';
        }, 150);
        
        // 4. Conclude the download layout visibility gracefully after file transfer handover finishes
        setTimeout(() => {
            clearInterval(trackingInterval);
            if (bar) bar.style.width = '100%';
            if (pctText) pctText.textContent = '100%';
            if (titleText) titleText.textContent = 'Download Started!';
            
            // Clean up pop-up and return homepage layout visibility back to normal
            setTimeout(() => {
                if (overlay) overlay.style.display = 'none';
                if (bar) bar.style.width = '0%';
                if (pctText) pctText.textContent = '0%';
                if (titleText) titleText.textContent = 'Preparing Download...';
                isDownloading = false; // Reset blocker hook safely for next visitor clicks
            }, 1200);
            
        }, 4500); // 4.5 seconds timeout matches mobile device network processing speeds perfectly
    }

    function sendTracking(lang) {
        // 1. Grab the elements
        const totalEl = document.getElementById('total-count');
        const langEl = document.getElementById('lang-count');

        // 2. Increment the numbers immediately on screen
        if (totalEl && langEl) {
            totalEl.textContent = parseInt(totalEl.textContent || 0) + 1;
            langEl.textContent = parseInt(langEl.textContent || 0) + 1;
        }

        // 3. Send the background tracking request
        const formData = new FormData();
        formData.append('action', 'track_download');
        formData.append('lang', lang);

        fetch(window.location.href, {
            method: 'POST',
            body: formData,
            keepalive: true
        });
    }

    const currentLang = "<?php echo $currentLang; ?>";

    async function loadArticle() {
        const overlay = document.getElementById('loading-overlay');
        const msg = document.getElementById('loader-msg');
        
        try {
            // Update the message so you know the script is working
            if (msg) msg.innerHTML = "Loading";

            const response = await fetch('<?php echo $baseHref; ?>json/index.json');
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

</body>
</html>
