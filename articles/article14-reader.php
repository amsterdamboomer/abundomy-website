<?php 
    // =========================================================================
    // STEP 1: PRE-LOAD MULTI-LINGUAL SEO METADATA (BEFORE HEADER EXECUTIONS)
    // =========================================================================
    $projectRoot = str_replace('\\', '/', dirname(__FILE__));
    
    if (session_status() === PHP_SESSION_NONE) { session_start(); }
    $seoLang = $_SESSION['user_lang'] ?? $_COOKIE['site_lang'] ?? 'en';

    // Target the specific translation JSON profile for this article file
    $jsonPath = $projectRoot . "/../json/article14.json";
    
    // FIXED: Set to exactly match your education page index definition for line 14
    $fallbackTitle = "From Bankers to Corona"; 
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
    
    // Explicit dynamic key-phrases matching the specific content of Article 14
    $pageKeywords = "Bankers to Corona, Financial Crisis, Economic Control, Crisis Management, Monetary Impact, Social Control";

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
                <input type="hidden" name="article_id" value="article14">
                <input type="hidden" name="lang" value="<?php echo $currentLang; ?>">
                <button type="submit" name="generate_pdf" class='login-button pdf-button'>PDF</button>
            </form>
        </div>
    </div>
    <!-- ========================================= -->
    <span class='par_bold' id='tx_04'></span>
    <p class='par' id='tx_05'></p>
    <p class='par' id='tx_06'></p>
    <span class='title3' id='tx_07'></span>
    <p class='par' id='tx_08'></p>
    <span class='title3' id='tx_09'></span>
    <p class='par' id='tx_10'></p>
    <span class='title3' id='tx_11'></span>
    <p class='par' id='tx_12'></p>
    <span class='title3' id='tx_13'></span>
    <p class='par' id='tx_14'></p>
    <span class='title3' id='tx_15'></span>
    <p class='par' id='tx_16'></p>
    <span class='title3' id='tx_17'></span>
    <p class='par' id='tx_18'></p>
    <span class='title3' id='tx_19'></span>
    <p class='par' id='tx_20'></p>
    <span class='title3' id='tx_21'></span>
    <p class='par' id='tx_22'></p>
    <span class='title3' id='tx_23'></span>
    <p class='par' id='tx_24'></p>
    <span class='title3' id='tx_25'></span>
    <p class='par' id='tx_26'></p>
    <p class='par' id='tx_27'></p>
    <p class='par' id='tx_28'></p>
    <p class='par' id='tx_29'></p>
     <span class='title3' id='tx_30'></span>
    <p class='par' id='tx_31'></p>
    <img src='<?php echo $baseHref; ?>img/Photo Evelyn De Rothschild and Prince Charles 900x645.jpg' style='width: clamp(450px, 156.25vw, 900px); aspect-ratio: 900 / 645; height: auto !important; display: block; margin: auto; object-fit: contain;' /><br>
    <p class='par' id='tx_32'></p>
     <span class='title3' id='tx_33'></span>
    <p class='par' id='tx_34'></p>
    <span class='title3' id='tx_35'></span>
    <p class='par' id='tx_36'></p>
    <span class='title3' id='tx_37'></span>
    <p class='par' id='tx_38'></p>
    <span class='title3' id='tx_39'></span>
    <p class='par' id='tx_40'></p>
    <span class='par_bold' id='tx_41'></span>
    <p class='par' id='tx_42'></p>
    <span class='par_bold' id='tx_43'></span>
    <p class='par' id='tx_44'></p>
    <span class='title3' id='tx_45'></span>
    <p class='par' id='tx_46'></p>
    <span class='title3' id='tx_47'></span>
    <p class='par' id='tx_48'></p>
    <span class='par_bold' id='tx_49'></span>
    <p class='par' id='tx_50'></p>
    <span class='title3' id='tx_51'></span>
    <ul>
      <li><a href='https://youtu.be/cTPopNG6LRM' class='link' target='_blank' id='tx_52'></a></li>
      <li><a href='https://www.corbettreport.com/bigoil/' class='link' target='_blank' id='tx_53'></a></li>
      <li><a href='http://www.sourcewatch.org/index.php?title=Rockefeller_Foundation' class='link' target='_blank' id='tx_54'></a></li>
      <li><a href='https://www.naturalnews.com/036484_Bayer_Nazi_war_crimes.html' class='link' target='_blank' id='tx_55'></a></li>
      <li><a href='https://en.wikipedia.org/wiki/Balfour_Declaration' class='link' target='_blank' id='tx_56'></a></li>
      <li><a href='https://youtu.be/96sAffLWy_8' class='link' target='_blank' id='tx_57'></a></li>
      <li><a href='https://www.corbettreport.com/meet-bill-gates/' class='link' target='_blank' id='tx_58'></a></li>
      <li><a href='https://youtu.be/vP5YsPt7r2g' class='link' target='_blank' id='tx_59'></a></li>
      <li><a href='http://www.nommeraadio.ee/meedia/pdf/RRS/Rockefeller%20Foundation.pdf' class='link' target='_blank' id='tx_60'></a></li>
      <li><a href='https://centerforhealthsecurity.org/event201/' class='link' target='_blank' id='tx_61'></a></li>
      <li><a href='https://zelfzorgcovid19.nl/' class='link' target='_blank' id='tx_62'></a></li>
      <li><a href='https://vladimirzelenkomd.com/zelenko-prophylaxis-protocol/' class='link' target='_blank' id='tx_63'></a></li>
      <li><a href='https://youtu.be/CZbnvWaEvYY' class='link' target='_blank' id='tx_64'></a></li>
      <li><a href='https://www.raptureready.com/2020/07/20/gates-mastercard-gavi-beta-test-vaccine-by-geri-ungurean/' class='link' target='_blank' id='tx_65'></a></li>
    </ul>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__text" id='tx_66'></p>
      <p class="blockquote__text" id='tx_67'></p>
      <p class="blockquote__text" id='tx_68'></p>
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

            const response = await fetch('<?php echo $baseHref; ?>json/article14.json');
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