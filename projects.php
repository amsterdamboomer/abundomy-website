<?php 
    // =========================================================================
    // STEP 1: PRE-LOAD MULTI-LINGUAL SEO METADATA (BEFORE HEADER EXECUTIONS)
    // =========================================================================
    $projectRoot = str_replace('\\', '/', dirname(__FILE__));
    
    if (session_status() === PHP_SESSION_NONE) { session_start(); }
    $seoLang = $_SESSION['user_lang'] ?? $_COOKIE['site_lang'] ?? 'en';

    // We target projects.json for this page's translations
    $jsonPath = $projectRoot . "/json/projects.json";
    $fallbackTitle = "Projects"; // Meaning of tx_02
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
    $pageDesc = "Explore active " . $fallbackTitle . " and initiatives built on the " . $fallbackBrand . " ecosystem.";

    // THE METADATA ADDITION: Custom key-phrases explicitly targeting your development track
    $pageKeywords = "Active Projects, Practical Initiatives, Monetary Ecosystem, Alternative Solutions, Economic Models";

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
            
    <p class='par' id='tx_03'>Our innovations are inspired by many ancient knowledge systems of indigenous cultures. Teaching these strategies come natural as many of our solutions were already in use ages ago.</p><br>
    <p class='par' id='tx_04'>To start preparing for a world of abundance we currently focus on five programs that local communities can use to financially protect themselves against wealth extraction. This is necessary as the now available currency systems are designed to only benefit the real owners of these systems. These are the programs:</p><br>
    <img class="small-image" id="IC0" src="img/00_Shield_Community_Icon.png" alt="Buy_Local_Sell_Global">
    <table class="title-table">
        <tr>
            <th class='number-box' id='tx_05'>1</th>
            <th class='single-title-box'><p class='title' id='tx_06'>Buy local, sell global</p></th>
        </tr>
    </table>
    <p class='par' id='tx_07'>Try to avoid buying anything from multinational companies. Because international companies are owned by the same people that create money, they hold an advantage over everybody else. The only way to break their advantage is to only buy from local stores, even when the life of local shops is made difficult by global regulations and laws and their prices seem higher, always support your local shops, as the same people will one day also support you.</p>
    <br>
    <img class="small-image" id="IC1" src="img/00_Buy_Local_Sell_Global.png" alt="Buy_Local_Sell_Global">
    <br>
    <table class="title-table">
        <tr>
            <th class='number-box' id='tx_08'>2</th>
            <th class='title-box'><p class='title' id='tx_09'>Borrow from friends, not from banks.</p></th>
        </tr>
    </table>
    <p class='par' id='tx_10'>Try to eradicate any debt to financial institutes, as debt is the mechanism that ultimately extracts all wealth from your community. The people that own the banks only need to print money to achieve this, while you struggle every day to make a decent living and pay back the loan. The only purpose of a bank-loan that is "granted" to you, is to take away part of your wealth. Instead of allowing people that don't work but just print money, to extract your wealth, grant friends from your community this privilege. Before you however take a loan, first think about possible other ways. Partnering with a friend in a business for example, might be better that taking a loan from him.</p>
    <br>
    <img class="small-image" id="IC2" src="img/00_Friends_Not_Banks_Icon.png" alt="Friends_Not_Bankse">
    <br>
    <table class="title-table">
        <tr>
            <th class='number-box' id='tx_11'>3</th>
            <th class='single-title-box'><p class='title' id='tx_12'>Barter before paying</p></th>
        </tr>
    </table>
    <p class='par' id='tx_13'>The best way to avoid financial wealth extraction by banks, is by not using money at all. If someone helps you, for example to fix the plumbing in your house, provide him a meal, a chicken you own or some of the crops from your land. You can write an IOU message that you will return the favor one day. There are also online barter systems that help you find people to barter with.</p>
    <br>
    <img class="small-image" id="IC3" src="img/00_Barter_Not_Payment_Icon.png" alt="Barter_Not_Payment">
    <br>
    <table class="title-table">
        <tr>
            <th class='number-box' id='tx_14'>4</th>
            <th class='single-title-box'><p class='title' id='tx_15'>Eradicate mortgages</p></th>
        </tr>
    </table>
    <p class='par' id='tx_16'>The most devastating and wealth extracting loans are mortgages. If people from your community have taken mortgages, come together and create plans to get your entire community rid of these financial strangle-hold situations. The same applies for other large bank loans, like a car or motorcycle lease. If anyone in your community wants to build a house, let the community help this person with manual labor and materials. That person will return the favor easier when he doesn't need to use all his time to pay back a mortgage.</p>
    <br>
    <img class="small-image" id="IC4" src="img/00_No_Mortgage_Icon.png" alt="No_Mortgage">
    <br>
    <table class="title-table">
        <tr>
            <th class='number-box' id='tx_17'>5</th>
            <th class='title-box'><p class='title' id='tx_18'>Learn how to make money neutral again</p></th>
        </tr>
    </table>
    <p class='par' id='tx_19'>To transition to clean, ethical money, we first need to educate our communities what is wrong with our current money and what would be a fair system to replace it with. The measures above are temporary. Money could be a proper instrument if it would have been designed correctly. This is however a massive reform that only can succeed when people understand and can recognize how money can be created, distributed and monitored in a fair way.</p>
    <br>
    <img class="small-image" id="IC5" src="img/00_Learn_About_Neutral_Money_Icon.png" alt="Learn_About_Neutral_Money">    
    <br>
    <table class="title-table">
        <tr>
            <th class='number-box'>&nbsp;!&nbsp;</th>
            <th class='title-box'><p class='title' id='tx_20'>Conclusion</p></th>
        </tr>
    </table>
    <p class='par' id='tx_21'>With these five programs local communities can immediately start working on becoming financially stronger, independent and informed. Many religious scriptures already warn us for financial deceptions and told us we live in a World of Abundance. We - at World of Abundance - therefore see it as our mission to help educating local communities how to convert these warnings into practical steps to protect local communities and make the world a better and fairer place for everyone.</p>
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

            const response = await fetch('<?php echo $baseHref; ?>json/projects.json');
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
        const subjectEl = document.getElementById('tx_22');
        const link = document.getElementById('mailLink');
        if (link && subjectEl) {
            const subjectText = subjectEl.innerText || subjectEl.textContent;
            // This fixed string ensures the email address is perfect
            link.href = "mailto:info@abundomy.com?subject=" + encodeURIComponent(subjectText.trim());
        }
    }

</script>

<?php include_once "footer.php"; ?>
</body>
</html>