<?php 
    // =========================================================================
    // STEP 1: PRE-LOAD MULTI-LINGUAL SEO METADATA (BEFORE HEADER EXECUTIONS)
    // =========================================================================
    $projectRoot = str_replace('\\', '/', dirname(__FILE__));
    
    if (session_status() === PHP_SESSION_NONE) { session_start(); }
    $seoLang = $_SESSION['user_lang'] ?? $_COOKIE['site_lang'] ?? 'en';

    // Target the specific translation JSON profile for this article file
    $jsonPath = $projectRoot . "/../json/article02.json";
    $fallbackTitle = "The Root Of All Evil"; 
    $fallbackDesc = "Read localized material insights regarding global resource structural theories.";
    $fallbackBrand = "Abundomy";

    if (file_exists($jsonPath)) {
        $jsonData = json_decode(file_get_contents($jsonPath), true);
        // tx_01 isolates the Article Title, tx_02 isolates the Subtitle/Intro lines
        $fallbackTitle = $jsonData[$seoLang]['tx_01'] ?? $jsonData['en']['tx_01'] ?? $fallbackTitle;
        $fallbackDesc = $jsonData[$seoLang]['tx_02'] ?? $jsonData['en']['tx_02'] ?? $fallbackDesc;
    }

    // THE MASTER SEO STRATEGY: Combines "Page Name | Brand Name" cleanly in every language
    $pageTitle = $fallbackTitle . " | " . $fallbackBrand;
    $pageDesc = htmlspecialchars($fallbackDesc, ENT_QUOTES, 'UTF-8');
    
    // Explicit dynamic key-phrases matching the specific content of Article 02
    $pageKeywords = "Root of All Evil, Monetary System, Banking Critique, Wealth Corruption, Economic Distortions";

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
                <td class='imgtext' id='tx_03'></td>
              </tr>
            </table>
        </div>

        <div class="pdf-wrap">
            <form action="../includes/generate-pdf-r.inc.php" method="POST" target="_blank" style="display:inline;">
                <input type="hidden" name="article_id" value="article02">
                <input type="hidden" name="lang" value="<?php echo $currentLang; ?>">
                <button type="submit" name="generate_pdf" class='login-button pdf-button'>PDF</button>
            </form>
        </div>
    </div>
    <!-- ========================================= -->

    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__text" id='tx_04'></p>
    </blockquote>
    <img src='<?php echo $baseHref; ?>img/Photo Root Of All Evil_01 377x612.jpg' style='width: clamp(189px, 65.45vw, 377px); aspect-ratio: 377 / 612; height: auto !important; display: block; margin: auto; object-fit: contain;' /><br>
    <p class='par' id='tx_05'></p>
    <p class='par_italic' id='tx_06'></p>
    <p class='par' id='tx_07'></p>
    <span class='title3' id='tx_08'></span>
    <p class='par' id='tx_09'></p>
    <img src='<?php echo $baseHref; ?>img/Photo Root Of All Evil_02 700x491.jpg' class="norm-image"><br>
    <p class='par' id='tx_10'></p>
    <span class='title3' id='tx_11'></span>
    <p class='par' id='tx_12'></p>
    <img src='<?php echo $baseHref; ?>img/Photo Root Of All Evil_03 700x476.jpg' style='width: clamp(350px, 121.53vw, 700px); aspect-ratio: 700 / 476; height: auto !important; display: block; margin: auto; object-fit: contain;' /><br>
    <span class='title3' id='tx_13'></span>
    <p class='par' id='tx_14'></p>
    <img src='<?php echo $baseHref; ?>img/Photo Root Of All Evil_04 700x340.jpg' style='width: clamp(350px, 121.53vw, 700px); aspect-ratio: 700 / 340; height: auto !important; display: block; margin: auto; object-fit: contain;' />
    <img src='<?php echo $baseHref; ?>img/Photo Root Of All Evil_05 700x372.jpg' style='width: clamp(350px, 121.53vw, 700px); aspect-ratio: 700 / 372; height: auto !important; display: block; margin: auto; object-fit: contain;' /><br>
    <span class='title3' id='tx_15'></span>
    <p class='par' id='tx_16'></p>
    <img src='<?php echo $baseHref; ?>img/Photo Root Of All Evil_06 700x394.jpg' class="norm-image"><br>
    <span class='title3' id='tx_17'></span>
    <p class='par' id='tx_18'></p>
    <img src='<?php echo $baseHref; ?>img/Photo Root Of All Evil_07 700x256.jpg' class="norm-image"><br>
    <p class='par' id='tx_19'></p>
    <span class='title3' id='tx_20'></span>
    <p class='par' id='tx_21'></p>
    <p class='par' id='tx_22'></p>
    <img src='<?php echo $baseHref; ?>img/Photo Root Of All Evil_08 700x380.jpg' class="norm-image"><br>
    <p class='par' id='tx_23'></p>
    <p class='par' id='tx_24'></p>
    <span class='title3' id='tx_25'></span>
    <p class='par' id='tx_26'></p>
    <img src='<?php echo $baseHref; ?>img/Photo Root Of All Evil_09 700x393.jpg' class="norm-image"><br>
    <span class='title3' id='tx_27'></span>
    <p class='par' id='tx_28'></p>
    <p class='par' id='tx_29'></p>
    <p class='par' id='tx_30'></p>
    <p class='par' id='tx_31'></p>
    <p class='par' id='tx_32'></p>
    <span class='title3' id='tx_33'></span>
    <ul>
      <li><a href='https://en.wikipedia.org/wiki/Seven_deadly_sins' class='link' target='_blank' id='tx_34'></a></li>
      <li><a href='https://rumble.com/v69y9xa-the-money-masters.html' class='link' target='_blank' id='tx_35'></a></li>
      <li><a href='https://youtu.be/PmMQbGPl28E?si=PVI_kzQIIi-njjg-' class='link' target='_blank' id='tx_36'></a></li>
      <li><a href='https://en.wikipedia.org/wiki/C._S._Lewis' class='link' target='_blank' id='tx_37'></a></li>
      <li><a href='https://en.wikipedia.org/wiki/Mere_Christianity' class='link' target='_blank' id='tx_38'></a></li>
    </ul>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__text" id='tx_39'></p>
      <p class="blockquote__text" id='tx_40'></p>
      <p class="blockquote__text" id='tx_41'></p>
    </blockquote>
    <!-- ========================================= -->
    <br>
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

            const response = await fetch('<?php echo $baseHref; ?>json/article02.json');
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