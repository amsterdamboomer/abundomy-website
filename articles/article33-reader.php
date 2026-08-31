<?php 
    // =========================================================================
    // STEP 1: PRE-LOAD MULTI-LINGUAL SEO METADATA (BEFORE HEADER EXECUTIONS)
    // =========================================================================
    $projectRoot = str_replace('\\', '/', dirname(__FILE__));
    
    if (session_status() === PHP_SESSION_NONE) { session_start(); }
    $seoLang = $_SESSION['user_lang'] ?? $_COOKIE['site_lang'] ?? 'en';

    // Target the specific translation JSON profile for this article file
    $jsonPath = $projectRoot . "/../json/article31.json";
    
    // FIXED: Set to exactly match your education page index definition for line 31
    $fallbackTitle = "Abundomy 2030 Judgement Day";
    $fallbackDesc = "Read localized material insights regarding global resource structural theories.";
    $fallbackBrand = "Abundomy";

    if (file_exists($jsonPath)) {
        $jsonData = json_decode(file_get_contents($jsonPath), true);
        $fallbackTitle = $jsonData[$seoLang]['tx_01'] ?? $jsonData['en']['tx_01'] ?? $fallbackTitle;
        $fallbackDesc = $jsonData[$seoLang]['tx_02'] ?? $jsonData['en']['tx_02'] ?? $fallbackDesc;
    }

    // THE SEO STRATEGY FIX: Combines "Page Name | Brand Name" beautifully in every language
    $pageTitle = $fallbackTitle . " | " . $fallbackBrand;
    $pageDesc = htmlspecialchars($fallbackDesc, ENT_QUOTES, 'UTF-8');
    
    // THE METADATA ADDITION: Custom key-phrases explicitly targeting your definitive article timeline theme
    $pageKeywords = "Abundomy 2030, Judgement Day, Economic Timeline, Agenda 2030 Alternative, System Transition, Monetary Horizon";

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
    <span class='title1' id='tx_01'>What is Abundomy</span>
    <span class='title4' id='tx_02'>In as few words as possible!</span>

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
                <td class='imgtext' id='tx_03'>17 January 2026</td>
              </tr>
            </table>
        </div>

        <div class="pdf-wrap">
            <form action="../includes/generate-pdf-r.inc.php" method="POST" target="_blank" style="display:inline;">
                <input type="hidden" name="article_id" value="article33">
                <input type="hidden" name="lang" value="<?php echo $currentLang; ?>">
                <button type="submit" name="generate_pdf" class='login-button pdf-button'>PDF</button>
            </form>
        </div>
    </div>
    <!-- ========================================= -->
    <p class='par' id='tx_04'>Our current economy is run by a tiny group of hidden criminals that we allow to print money for themselves as much as they want and can. With that privilege they created artificial scarcity for everyone else, divide us and exterminate us with war, pharmaceuticals and anything else bad they - and the CEO's and politicians they control - can think of.</p>
    <p class='par' id='tx_05'>Abundomy is the ethical opposite of our current predicament. The people that understand the Abundomy philosophy saved themselves from their indoctrination and can now see that our current situation is not normal. They also see that there is no point fighting the system using the tools the system provides, like law-fare, voting, protesting, using alternatives for fiat money or even violence.</p>
    <p class='par' id='tx_06'>The only way to leave their system is by simply abandoning it altogether with everyone, taking possession of all real estate, vehicles, factories and other infrastructure and transition to an ethical financial system that taps into the abundance the world has to offer. At that moment we implement new human rights, new global law and install new local governments. The people that are involved in the Abundomy movement work on envisioning this new type of society and work on ways to make this transition as smooth as possible.</p>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__text" id='tx_07'>17 January 2026</p>
      <p class="blockquote__text" id='tx_08'>Teun van Sambeek MSc, MRE</p>
      <p class="blockquote__text" id='tx_09'>Creator of Abundomy Money</p>
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

            const response = await fetch('<?php echo $baseHref; ?>json/article33.json');
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


<!--
    <p class='par_italic' id='tx_05' style='text-align: center; width: 100%; display: block;'></p>
    <span class='title3' id='tx_09'></span>
    <p class='par' id='tx_13'></p>
    <ol>
        <li><p class='par' id='tx_14'></p></li>
    </ol> -->

<?php include_once "../footer.php"; ?>
</body>
</html>