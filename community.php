<?php 
    // =========================================================================
    // STEP 1: PRE-LOAD MULTI-LINGUAL SEO METADATA (BEFORE HEADER EXECUTIONS)
    // =========================================================================
    $projectRoot = str_replace('\\', '/', dirname(__FILE__));
    
    if (session_status() === PHP_SESSION_NONE) { session_start(); }
    $seoLang = $_SESSION['user_lang'] ?? $_COOKIE['site_lang'] ?? 'en';

    // We target community.json for this page's translations
    $jsonPath = $projectRoot . "/json/community.json";
    $fallbackTitle = "Community"; // Meaning of tx_02
    $fallbackBrand = "Abundomy";  // Meaning of tx_01

    if (file_exists($jsonPath)) {
        $jsonData = json_decode(file_get_contents($jsonPath), true);
        // Extract localized text for page name (tx_02) and brand name (tx_01)
        $fallbackTitle = $jsonData[$seoLang]['tx_02'] ?? $jsonData['en']['tx_02'] ?? $fallbackTitle;
        $fallbackBrand = $jsonData[$seoLang]['tx_01'] ?? $jsonData['en']['tx_01'] ?? $fallbackBrand;
    }

    // THE SEO STRATEGY: Combines "Page Name | Brand Name" dynamically in every language
    $pageTitle = $fallbackTitle . " | " . $fallbackBrand;
    
    // Provide a safe localized fallback description for search crawlers
    $pageDesc = "Join the global " . $fallbackTitle . " built around " . $fallbackBrand . " systems.";

    // THE METADATA ADDITION: Custom key-phrases explicitly targeting your network groups
    $pageKeywords = "Global Community, Social Groups, Telegram Chats, WhatsApp Network, Economic Movement, Public Forum";

    // =========================================================================
    // STEP 2: LOAD MASTER SYSTEM FRAMEWORK
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
    <span class='top-title' id='tx_01'></span>
</div>
<div id="capture-section" class="selectable-text <?php echo $isRTL ? 'rtl-mode' : ''; ?>" <?php echo $isRTL ? 'dir="rtl"' : 'dir="ltr"'; ?>>
    <span class='title1' id='tx_02'></span><br>

    <p class='par' id='tx_03'>Ultimately our goal is to make individual people financially resilient. The best way to achieve this is to make sure the communities these people live in are activated. When people cooperate, anything is possible.</p><br>
    <table class="title-table">
        <tr>
            <th class='number-box' id='tx_04'>1</th>
            <th class='title-box'><p class='title' id='tx_05'>Showcase</p></th>
        </tr>
    </table>
    <p class='par' id='tx_06'>It is very important all communities around the world can see examples of how other communities were able to make themselves financially resillient. This page is used to showcase some of the best examples.</p>
    <img class="small-image" id="IC0" src="img/00_Success_Icon.png" alt="Success">
    <br><br>
    <table class="title-table">
        <tr>
            <th class='number-box' id='tx_07'>2</th>
            <th class='title-box'><p class='title' id='tx_08'>Share your Story</p></th>
        </tr>
    </table>
    <p class='par' id='tx_09'>If you also want to share the success story of your community, you can send your story to us:</p>
    <?php
    // 1. Hidden span for the Subject (Your script will translate this)
        echo "<span id='tx_10' style='display:none;'>Share your community success story!</span>";

        // 2. The Link and Button
        echo "<a id='mailLink' href='mailto:info@abundomy.com?subject=' target='_blank'>";
        echo "<button type='button' class='login-button' id='tx_11'>Share Your Story</button>";
        echo "</a>";    
    ?>
    <img class="small-image" id="IC1" src="img/00_Success_Story_Icon.png" alt="Success_Story">
    <br><br>   

    <table class="title-table">
        <tr>
            <th class='number-box' id='tx_12'>3</th>
            <th class='title-box'><p class='title' id='tx_13'>Partnership and Contact</p></th>
        </tr>
    </table>
    <p class='par' id='tx_14'>If you want to become a beneficial partner or you want to find other communities to partner with, you can contact us:</p>
    <?php
    // 1. Hidden span for the Subject (Your script will translate this)
        echo "<span id='tx_15' style='display:none;'>Create a partnership!</span>";

        // 2. The Link and Button
        echo "<a id='mailLink2' href='mailto:info@abundomy.com?subject=' target='_blank'>";
        echo "<button type='button' class='login-button' id='tx_16'>Create a Partnership</button>";
        echo "</a>";    
    ?>
    <img class="small-image" id="IC3" src="img/00_Partner_Contact_Icon.png" alt="wedding"><br> 
    <span class='feedback' style='color:#916B01;' id='tx_17'>Address</span>
    <span class='feedback' style='color:#ffffff;font-size: clamp(10px, 3.47vw, 20px);'>Gasabo District</span>
    <span class='feedback' style='color:#ffffff;font-size: clamp(10px, 3.47vw, 20px);'>Sector Gisozi</span>
    <span class='feedback' style='color:#ffffff;font-size: clamp(10px, 3.47vw, 20px);'>Cell Musezero</span>
    <span class='feedback' style='color:#ffffff;font-size: clamp(10px, 3.47vw, 20px);'>Village Gasave</span>
    <span class='feedback' style='color:#ffffff;font-size: clamp(10px, 3.47vw, 20px);'>Road Gakinjiro</span>
    <span class='feedback' style='color:#ffffff;font-size: clamp(10px, 3.47vw, 20px);'>KK 33 Ave, House 30 apt 2</span>
    <span class='feedback' style='color:#ffffff;font-size: clamp(10px, 3.47vw, 20px);'>Kigali, RWANDA</span>
    <span class='feedback' style='color:#ffffff;font-size: clamp(10px, 3.47vw, 20px);'>+250 796 170 888</span><br>

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

            const response = await fetch('<?php echo $baseHref; ?>json/community.json');
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

            updateMailLink();
            updateMailLink2(); 

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


    function updateMailLink() {
        const subjectEl = document.getElementById('tx_10'); 
        const link = document.getElementById('mailLink');
        if (link && subjectEl) {
            const subjectText = subjectEl.innerText || subjectEl.textContent;
            link.href = "mailto:info@abundomy.com?subject=" + encodeURIComponent(subjectText.trim());
        }
    }

    function updateMailLink2() {
        const subjectEl2 = document.getElementById('tx_15'); 
        const link2 = document.getElementById('mailLink2');
        if (link2 && subjectEl2) {
            const subjectText2 = subjectEl2.innerText || subjectEl2.textContent;
            link2.href = "mailto:info@abundomy.com?subject=" + encodeURIComponent(subjectText2.trim());
        }
    }

</script>

<?php include_once "footer.php"; ?>
</body>
</html>