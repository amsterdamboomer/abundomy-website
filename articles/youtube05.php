<?php 
    // =========================================================================
    // STEP 1: PRE-LOAD MULTI-LINGUAL SEO METADATA (BEFORE HEADER EXECUTIONS)
    // =========================================================================
    $projectRoot = str_replace('\\', '/', dirname(__FILE__));
    
    if (session_status() === PHP_SESSION_NONE) { session_start(); }
    $seoLang = $_SESSION['user_lang'] ?? $_COOKIE['site_lang'] ?? 'en';

    // Target the specific translation JSON profile for this view page
    $jsonPath = $projectRoot . "/../json/youtube05.json";
    $fallbackTitle = "Vision"; 
    $fallbackDesc = "Vision of the transition to the Abundomy.";
    $fallbackBrand = "Abundomy";

    if (file_exists($jsonPath)) {
        $jsonData = json_decode(file_get_contents($jsonPath), true);
        // tx_01 isolates the Video Title, tx_02 isolates the Subtitle description brief
        $fallbackTitle = $jsonData[$seoLang]['tx_01'] ?? $jsonData['en']['tx_01'] ?? $fallbackTitle;
        $fallbackDesc = $jsonData[$seoLang]['tx_02'] ?? $jsonData['en']['tx_02'] ?? $fallbackDesc;
    }

    // THE MASTER SEO STRATEGY: Combines "Page Name | Brand Name" cleanly in every language
    $pageTitle = $fallbackTitle . " | " . $fallbackBrand;
    $pageDesc = htmlspecialchars($fallbackDesc, ENT_QUOTES, 'UTF-8');
    
    // Explicit dynamic key-phrases matching this specific video theme
    $pageKeywords = "Abundomy Vision, Economic Transition, Global System Reform, Resource Based Economy, Future Solutions";

    // =========================================================================
    // STEP 2: LOAD MASTER SYSTEM FRAMEWORK
    // =========================================================================
    include_once "../header.php"; 
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

<div id="capture-section" class="selectable-text <?php echo $isRTL ? 'rtl-mode' : ''; ?>" <?php echo $isRTL ? 'dir="rtl"' : 'dir="ltr"'; ?>>
    <br>
    <span class='title1' id='tx_01'></span>
    <span class='title4' id='tx_02'></span>

    <div class="article-header-row">
        <div class="author-wrap">
            <table class="author-table">
              <tr>
                <th rowspan='2'>
                    <img src='<?php echo $baseHref; ?>img/Photo Teun 100x100.jpg' class="author-photo" />
                </th>
                <td class='imgtext'>TEUN VAN SAMBEEK</td>
              </tr>
              <tr>
                <td class='imgtext' id='tx_03'>21 Feb 2026</td>
              </tr>
            </table>
        </div>
    </div>
    <!-- ========================================= -->
    <!-- Fully Functional Fail-Safe Regular YouTube Video Block -->
    <div class="regular-video-wrapper" style="position: relative; width: clamp(250px, 86.8vw, 500px); aspect-ratio: 1860 / 1042; background: #000; overflow: hidden; border-radius: 12px; border: 2px solid var(--text, #916B01); box-shadow: 0 8px 24px rgba(0,0,0,0.5); margin: 20px auto; display: block;">
        
        <!-- 1. Custom Horizontal High-Definition Thumbnail -->
        <img src="<?php echo $baseHref; ?>img/ZeitgeistClip Thumbnail 500x280.jpg" 
             alt="Video Preview" 
             style="width: 100%; height: 100%; object-fit: cover; opacity: 0.75;" />
        
        <!-- 2. Interactive Overlay Interface Layer -->
        <div style="position: absolute; inset: 0; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 20px; text-align: center; gap: 15px; background: rgba(0, 0, 0, 0.35);">
            
            <!-- Centered Interactive Play Button Element Linking to YouTube Video -->
            <a href="https://youtu.be/UNtq9OL98JE?si=FafA9QKZs3Tj1trc" 
               target="_blank" 
               rel="noopener noreferrer" 
               style="width: 68px; height: 48px; background: rgba(229, 9, 20, 0.95); border-radius: 12px; display: flex; align-items: center; justify-content: center; box-shadow: 0 0 25px rgba(0,0,0,0.6); transition: transform 0.2s ease, background 0.2s ease; cursor: pointer; text-decoration: none;"
               onmouseover="this.style.transform='scale(1.08)'; this.style.background='#ff0000';" 
               onmouseout="this.style.transform='scale(1)'; this.style.background='rgba(229, 9, 20, 0.95)';">
                <svg viewBox="0 0 24 24" style="width: 28px; height: 28px; fill: #fff;">
                    <path d="M8 5v14l11-7z"/>
                </svg>
            </a>
            
            <!-- On-Screen Translatable Dynamic Explanatory Label -->
            <p class="par" id="tx_04" style="color: #fff; font-size: 14px; font-weight: bold; margin: 5px 0 0 0; padding: 0; text-shadow: 0 2px 4px rgba(0,0,0,0.9); text-align: center;">
                Click to watch on YouTube
            </p>
        </div>
    </div>


    <!-- ========================================= -->
</div>
<script>
    const currentLang = "<?php echo $currentLang; ?>";

    async function loadArticle() {
        const overlay = document.getElementById('loading-overlay');
        const msg = document.getElementById('loader-msg');
        
        try {
            // Update the message so you know the script is working
            if (msg) msg.innerHTML = "Loading... ...";

            const response = await fetch('<?php echo $baseHref; ?>json/youtube05.json');
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

<?php include_once "../footer.php"; ?>
</body>
</html>
