<?php 
    // =========================================================================
    // STEP 1: PRE-LOAD MULTI-LINGUAL SEO METADATA (BEFORE HEADER EXECUTIONS)
    // =========================================================================
    $projectRoot = str_replace('\\', '/', dirname(__FILE__));
    
    if (session_status() === PHP_SESSION_NONE) { session_start(); }
    $seoLang = $_SESSION['user_lang'] ?? $_COOKIE['site_lang'] ?? 'en';

    // Target the specific translation JSON profile for this article file
    $jsonPath = $projectRoot . "/../json/article15.json";
    
    // FIXED: Set to exactly match your education page index definition for line 15
    $fallbackTitle = "The Pyramid Scheme of Money and Interest"; 
    $fallbackDesc = "Read localized material insights regarding global resource structural theories.";
    $fallbackBrand = "Abundomy";

    if (file_exists($jsonPath)) {
        $jsonData = json_decode(file_get_contents($jsonPath), true);
        $fallbackTitle = $jsonData[$seoLang]['tx_01'] ?? $jsonData['en']['tx_01'] ?? $fallbackTitle;
        $fallbackDesc = $jsonData[$seoLang]['tx_02'] ?? $jsonData['en']['tx_02'] ?? $fallbackDesc;
    }

    // THE MASTER SEO STRATEGY: Combines "Page Name | Brand Name" cleanly in every language
    $pageTitle = $fallbackTitle . " | " . $fallbackBrand;
    $pageDesc = htmlspecialchars($fallbackDesc, ENT_QUOTES, 'UTF-8');
    
    // Explicit dynamic key-phrases matching the specific content of Article 15
    $pageKeywords = "Pyramid Scheme of Money, Interest System, Banking Pyramid, Financial Monopoly, Debt System, Usury Economics";

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
                <input type="hidden" name="article_id" value="article15">
                <input type="hidden" name="lang" value="<?php echo $currentLang; ?>">
                <button type="submit" name="generate_pdf" class='login-button pdf-button'>PDF</button>
            </form>
        </div>
    </div>
    <!-- ========================================= -->
    <img src='<?php echo $baseHref; ?>img/Photo Rule The World 700x439.jpg' class="norm-image"><br>
    <p class='par' id='tx_04'></p>
    <img src='<?php echo $baseHref; ?>img/Photo Pyramid 700x450.jpg' style='width: clamp(350px, 121.53vw, 700px); aspect-ratio: 700 / 450; height: auto !important; display: block; margin: auto; object-fit: contain;' />
    <span class='title3' id='tx_05'></span>
    <p class='par' id='tx_06'></p>
    <p class='par' id='tx_07'></p>
    <p class='par' id='tx_08'></p>
    <p class='par' id='tx_09'></p>
    <p class='par' id='tx_10'></p>
    <p class='par' id='tx_11'></p>
    <p class='par' id='tx_12'></p>
    <img src='<?php echo $baseHref; ?>img/Photo Nixon 700x542.jpg' style='width: clamp(350px, 121.53vw, 700px); aspect-ratio: 700 / 542; height: auto !important; display: block; margin: auto; object-fit: contain;' />
    <p class='par_italic' id='tx_13' style='text-align: center; width: 100%; display: block;'></p>
    <p class='par' id='tx_14'></p>
    <p class='par' id='tx_15'></p>
    <span class='title3' id='tx_16'></span>
    <img src='<?php echo $baseHref; ?>img/Photo Musical Chairs 700x396.jpg' class="norm-image"><br>
    <p class='par' id='tx_17'></p>
    <p class='par' id='tx_18'></p>
    <span class='title3' id='tx_19'></span>
    <p class='par' id='tx_20'></p>
    <img src='<?php echo $baseHref; ?>img/Photo Bernard Madoff 700x428.jpg' style='width: clamp(350px, 121.53vw, 700px); aspect-ratio: 700 / 428; height: auto !important; display: block; margin: auto; object-fit: contain;' />
    <p class='par_italic' id='tx_21' style='text-align: center; width: 100%; display: block;'></p>
    <p class='par' id='tx_22'></p>
    <img src='<?php echo $baseHref; ?>img/Photo Ponzi 700x435.jpg' style='width: clamp(350px, 121.53vw, 700px); aspect-ratio: 700 / 435; height: auto !important; display: block; margin: auto; object-fit: contain;' />
    <p class='par_italic' id='tx_23' style='text-align: center; width: 100%; display: block;'></p>
    <p class='par' id='tx_24'></p>
    <p class='par' id='tx_25'></p>
    <p class='par' id='tx_26'></p>
    <p class='par' id='tx_27'></p>
    <p class='par' id='tx_28'></p>
    <p class='par' id='tx_29'></p>
    <span class='title3' id='tx_30'></span>
    <p class='par' id='tx_31'></p>
    <p class='par' id='tx_32'></p>
    <p class='par' id='tx_33'></p>
    <p class='par' id='tx_34'></p>
    <p class='par' id='tx_35'></p>
    <span class='title3' id='tx_36'></span>
    <ul>
      <li><a href='https://youtu.be/LD6kvDHbIYY?si=nUt5IuX9iLD4vRvJ' class='link' target='_blank' id='tx_37'></a></li>
      <li><a href='https://en.wikipedia.org/wiki/Nixon_shock' class='link' target='_blank' id='tx_38'></a></li>
      <li><a href='https://en.wikipedia.org/wiki/Madoff_investment_scandal' class='link' target='_blank' id='tx_39'></a></li>
      <li><a href='https://en.wikipedia.org/wiki/Ponzi_scheme' class='link' target='_blank' id='tx_40'></a></li>
      <li><a href='https://en.wikipedia.org/wiki/Pyramid_scheme' class='link' target='_blank' id='tx_41'></a></li>
    </ul>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__text" id='tx_42'></p>
      <p class="blockquote__text" id='tx_43'></p>
      <p class="blockquote__text" id='tx_44'></p>
    </blockquote>
    <!-- ========================================= -->
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

            const response = await fetch('<?php echo $baseHref; ?>json/article15.json');
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