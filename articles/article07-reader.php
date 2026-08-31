<?php 
    // =========================================================================
    // STEP 1: PRE-LOAD MULTI-LINGUAL SEO METADATA (BEFORE HEADER EXECUTIONS)
    // =========================================================================
    $projectRoot = str_replace('\\', '/', dirname(__FILE__));
    
    if (session_status() === PHP_SESSION_NONE) { session_start(); }
    $seoLang = $_SESSION['user_lang'] ?? $_COOKIE['site_lang'] ?? 'en';

    // Target the specific translation JSON profile for this article file
    $jsonPath = $projectRoot . "/../json/article07.json";
    
    // FIXED: Set to exactly match your education page index definition for line 7
    $fallbackTitle = "Why Demurrage?"; 
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
    
    // Explicit dynamic key-phrases matching the specific content of Article 07
    $pageKeywords = "Why Demurrage, Demurrage Money, Silvio Gesell, Freiwirtschaft, Negative Interest, Currency Circulation";

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
                <input type="hidden" name="article_id" value="article07">
                <input type="hidden" name="lang" value="<?php echo $currentLang; ?>">
                <button type="submit" name="generate_pdf" class='login-button pdf-button'>PDF</button>
            </form>
        </div>
    </div>
    <!-- ========================================= -->
    <p class='par' id='tx_04'></p>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__text" id='tx_05'></p>
      <p class="blockquote__text" id='tx_06'></p>
    </blockquote>
    <img src='<?php echo $baseHref; ?>img/Photo Silvio Gesell 345x402.jpg' style='width: clamp(173px, 59.90vw, 345px); aspect-ratio: 345 / 402; height: auto !important; display: block; margin: auto; object-fit: contain;' />
    <p class='par_italic' id='tx_07' style='text-align: center; width: 100%; display: block;'></p>
    <span class='title3' id='tx_08'></span>
    <p class='par' id='tx_09'></p>
    <p class='par_bold' id='tx_10'></p>
    <p class='par' id='tx_11'></p>
    <img src='<?php echo $baseHref; ?>img/Photo Michael Unterguggenberger 282x450.jpg' style='width: clamp(141px, 48.96vw, 282px); aspect-ratio: 282 / 450; height: auto !important; display: block; margin: auto; object-fit: contain;' />
    <p class='par_italic' id='tx_12'></p>
    <p class='par' id='tx_13'></p>
    <blockquote class="blockquote blockquote--bordered">
    <p class="blockquote__text" id='tx_14'></p>
    </blockquote>
    <p class='par' id='tx_15'></p>
    <img src='<?php echo $baseHref; ?>img/Photo Woergl Coupons 700x411.jpg' style='width: clamp(350px, 121.53vw, 700px); aspect-ratio: 700 / 411; height: auto !important; display: block; margin: auto; object-fit: contain;' />
    <p class='par' id='tx_16'></p>
    <p class='par' id='tx_17'></p>
    <blockquote class="blockquote blockquote--bordered">
    <p class="blockquote__text" id='tx_18'></p>
    </blockquote>
    <p class='par' id='tx_19'></p>
    <p class='par' id='tx_20'></p>
    <p class='par_bold' id='tx_21'></p>
    <p class='par' id='tx_22'></p>
    <p class='par' id='tx_23'></p>
    <p class='par_italic' id='tx_24'></p>
    <p class='par' id='tx_25'></p>
    <p class='par_italic' id='tx_26'></p>
    <p class='par' id='tx_27'></p>
    <p class='par_italic' id='tx_28'></p>
    <p class='par' id='tx_29'></p>
    <span class='title3' id='tx_30'></span>
    <p class='par' id='tx_31'></p>
    <p class='par' id='tx_32'></p>
    <p class='par' id='tx_33'></p>
    <p class='par' id='tx_34'></p>
    <p class='par_bold' id='tx_35'></p>
    <p class='par' id='tx_36'></p>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__text" id='tx_37'></p>
    </blockquote>
    <p class='par' id='tx_38'></p>
    <p class='par' id='tx_39'></p>
    <img src='<?php echo $baseHref; ?>img/Photo Woergl 700x427.jpg' style='width: clamp(350px, 121.53vw, 700px); aspect-ratio: 700 / 427; height: auto !important; display: block; margin: auto; object-fit: contain;' /><br>
    <p class='par' id='tx_40'></p>
    <span class='title3' id='tx_41'></span>
    <p class='par' id='tx_42'></p>
    <p class='par' id='tx_43'></p>
    <p class='par' id='tx_44'></p>
    <span class='title3' id='tx_45'></span>
    <p class='par' id='tx_46'></p>
    <p class='par' id='tx_47'></p>
    <ol>
      <li><p class='par' id='tx_48'></p></li>
      <li><p class='par' id='tx_49'></p></li>
    </ol>  
    <p class='par' id='tx_50'></p>
    <p class='par' id='tx_51'></p>
    <p class='par' id='tx_52'></p>
    <img src='<?php echo $baseHref; ?>img/Photo Inflation 700x394.jpg' style='width: clamp(350px, 121.53vw, 700px); aspect-ratio: 700 / 394; height: auto !important; display: block; margin: auto; object-fit: contain;' />
    <span class='title3' id='tx_53'></span>
    <p class='par' id='tx_54'></p>
    <p class='par_italic' id='tx_55'></p>
    <p class='par' id='tx_56'></p>
    <p class='par' id='tx_57'></p>
    <p class='par' id='tx_58'></p>
    <p class='par' id='tx_59'></p>
    <p class='par' id='tx_60'></p>
    <p class='par' id='tx_61'></p>
    <p class='par' id='tx_62'></p>
    <p class='par' id='tx_63'></p>
    <p class='par' id='tx_64'></p>
    <p class='par' id='tx_65'></p>
    <p class='par' id='tx_66'></p>
    <span class='title3' id='tx_67'></span>
    <p class='par' id='tx_68'></p>
    <p class='par' id='tx_69'></p>
    <p class='par' id='tx_70'></p>
    <img src='<?php echo $baseHref; ?>img/Photo Bilbo 700x350.jpg' style='width: clamp(350px, 121.53vw, 700px); aspect-ratio: 700 / 350; height: auto !important; display: block; margin: auto; object-fit: contain;' /><br>
    <span class='title3' id='tx_71'></span>
    <ul>
      <li><a href='https://silviogesell.com/' class='link' target='_blank' id='tx_72'></a></li>
      <li><a href='https://unterguggenberger.org/the-free-economy-experiment-of-woergl-1932-1933/' class='link' target='_blank' id='tx_73'></a></li>
      <li><a href='https://www.abundomy.com/articles/article05-reader.php' class='link' target='_blank' id='tx_74'></a></li>
      <li><a href='https://www.youtube.com/watch?v=Ef8wc-fEn7g' class='link' target='_blank' id='tx_75'></a></li>
    </ul>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__text" id='tx_76'></p>
      <p class="blockquote__text" id='tx_77'></p>
      <p class="blockquote__text" id='tx_78'></p>
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

            const response = await fetch('<?php echo $baseHref; ?>json/article07.json');
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