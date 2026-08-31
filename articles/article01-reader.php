<?php 
    // =========================================================================
    // STEP 1: PRE-LOAD MULTI-LINGUAL SEO METADATA (BEFORE HEADER EXECUTIONS)
    // =========================================================================
    $projectRoot = str_replace('\\', '/', dirname(__FILE__));
    
    if (session_status() === PHP_SESSION_NONE) { session_start(); }
    $seoLang = $_SESSION['user_lang'] ?? $_COOKIE['site_lang'] ?? 'en';

    // Target the specific translation JSON profile for this text article file
    $jsonPath = $projectRoot . "/../json/article01.json";
    $fallbackTitle = "An introduction to Ethical Money"; 
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
    
    // Explicit dynamic key-phrases matching this introductory chapter theme
    $pageKeywords = "Ethical Money, Financial Reform, Monetary Design, System Alternative, Resource Economics";

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
                <input type="hidden" name="article_id" value="article01">
                <input type="hidden" name="lang" value="<?php echo $currentLang; ?>">
                <button type="submit" name="generate_pdf" class='login-button pdf-button'>PDF</button>
            </form>
        </div>
    </div>
    <!-- ========================================= -->
    <span class='title3' id='tx_04'></span>
    <p class='par' id='tx_05'></p>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__text" id='tx_06'></p>
    </blockquote>
    <p class='par' id='tx_08'></p>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__text" id='tx_09'></p>
      <p class="blockquote__text" id='tx_10'></p>
    </blockquote>
    <img src='<?php echo $baseHref; ?>img/Photo Voluntaryism 685x685.jpg' style='width: clamp(343px, 118.92vw, 685px); aspect-ratio: 1 / 1; height: auto !important; display: block; margin: auto; object-fit: contain;' /><br>
    <p class='par' id='tx_11'></p>
    <p class='par' id='tx_12'></p>
    <ol>
      <li><p class='par' id='tx_13'></p></li>
      <li><p class='par' id='tx_14'></p></li>
      <li><p class='par' id='tx_15'></p></li>
    </ol>  
    <p class='par' id='tx_16'></p>
    <span class='title3' id='tx_17'></span>
    <p class='par' id='tx_18'></p>
    <ol>
      <li><p class='par' id='tx_19'></p></li>
      <li><p class='par' id='tx_20'></p></li>
      <li><p class='par' id='tx_21'></p></li>
    </ol>  
    <p class='par' id='tx_22'></p>
    <span class='title3' id='tx_23'></span>
    <p class='par' id='tx_24'></p><br>
    <p class='par_bold' id='tx_25'></p>
    <p class='par' id='tx_26'></p><br>
    <p class='par_bold' id='tx_27'></p>
    <p class='par' id='tx_28'></p><br>
    <p class='par_bold' id='tx_29'></p>
    <p class='par' id='tx_30'></p><br>
    <p class='par_bold' id='tx_31'></p>
    <p class='par' id='tx_32'></p><br>
    <p class='par' id='tx_33'></p>
    <span class='title3' id='tx_34'></span>
    <p class='par' id='tx_35'></p>
    <p class='par' id='tx_36'></p>
    <p class='par' id='tx_38'></p>
    <p class='par' id='tx_39'></p>
    <p class='par' id='tx_40'></p>
    <p class='par' id='tx_41'></p>
    <span class='title3' id='tx_42'></span>
    <p class='par' id='tx_43'></p>
    <p class='par' id='tx_44'></p>
    <p class='par' id='tx_45'></p>
    <p class='par' id='tx_46'></p>
    <p class='par' id='tx_47'></p>
    <img src='<?php echo $baseHref; ?>img/1CoinH_358x358.png' style='width: clamp(178px, 62.15vw, 358px); aspect-ratio: 1 / 1; height: auto !important; display: block; margin: auto; object-fit: contain;' />
    <span class='title3' id='tx_48'></span>
    <p class='par' id='tx_49'></p>
    <span class='title3' id='tx_50'></span>
    <p class='par' id='tx_51'></p>
    <p class='par' id='tx_52'></p>
    <p class='par' id='tx_53'></p>
    <p class='par' id='tx_54'></p>
    <p class='par' id='tx_55'></p>
    <p class='par_italic' id='tx_56'></p>
    <p class='par_italic' id='tx_57'></p>
    <p class='par' id='tx_58'></p>
    <p class='par' id='tx_59'></p>
    <p class='par' id='tx_60'></p>
    <p class='par' id='tx_61'></p>
    <p class='par' id='tx_62'></p>
    <span class='title3' id='tx_63'></span>
    <p class='par' id='tx_64'></p>
    <p class='par' id='tx_65'></p>
    <p class='par' id='tx_66'></p>
    <span class='title3' id='tx_67'></span>
    <p class='par' id='tx_68'></p>
    <span class='title3' id='tx_69'></span>
    <p class='par' id='tx_70'></p>
    <span class='title3' id='tx_71'></span>
    <p class='par' id='tx_72'></p>
    <span class='title3' id='tx_73'></span>
    <p class='par' id='tx_74'></p>
    <p class='par_italic' id='tx_75'></p>
    <p class='par_italic' id='tx_76'></p>
    <span class='title3' id='tx_77'></span>
    <p class='par' id='tx_78'></p>
    <span class='title3' id='tx_79'></span>
    <p class='par' id='tx_80'></p>
    <span class='title3' id='tx_81'></span>
    <p class='par' id='tx_82'></p>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__text" id='tx_83'></p>
      <p class="blockquote__text" id='tx_84'></p>
      <p class="blockquote__text" id='tx_85'></p>
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

            const response = await fetch('<?php echo $baseHref; ?>json/article01.json');
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