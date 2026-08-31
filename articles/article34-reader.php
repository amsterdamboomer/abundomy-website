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
    <span class='title1' id='tx_01'>Focus</span>
    <span class='title4' id='tx_02'>Visualizing The World Of Abundance</span>

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
                <td class='imgtext' id='tx_03'>18 January 2026</td>
              </tr>
            </table>
        </div>

        <div class="pdf-wrap">
            <form action="../includes/generate-pdf-r.inc.php" method="POST" target="_blank" style="display:inline;">
                <input type="hidden" name="article_id" value="article34">
                <input type="hidden" name="lang" value="<?php echo $currentLang; ?>">
                <button type="submit" name="generate_pdf" class='login-button pdf-button'>PDF</button>
            </form>
        </div>
    </div>
    <!-- ========================================= -->
    <img src='<?php echo $baseHref; ?>img/Photo Focus.jpg' class="norm-image"><br>
    <p class='par' id='tx_04'>The biggest problem people have, is their indoctrination. We are taught all our life why we need to make money and how. We have an idea how criminals make money, and we see what politicians do and how that is driven by money. We think that there are different types of money: Gold, silver, coins, bills, credit in our bank accounts, Bitcoin and other crypto. And soon we will have the CBDC. This is how our economy works. We think that if you work hard, or if you are a successful criminal, you can earn enough money to stop working one day and enjoy the abundance of life.</p>
    <p class='par' id='tx_05'>It is however a lie. Money is not neutral. Money is a weapon that is used against us. The only real function of all the money listed above, is to slowly suck away any chance we have to enjoy the abundance of life. The unethical money forces us to compete with our fellowmen, as a game of musical chairs, in a world where everything is artificially made to be more scarce than it was the day before.</p>
    <p class='par' id='tx_06'>Next to that, we need to understand that the system is primarily built to protect itself. Fighting the system, using the tools it allows (like voting, protesting, using cash or crypto, revealing the truth about corruption and even violence) is pointless. Every fight with the system like that, will result in an even more totalitarian global government, so never take the bait.</p>
    <p class='par' id='tx_07'>We need to start understanding that literally everything you read in the mainstream and alternative media is there to distract you and to create your consent for the wars and agendas they need to protect themselves against you. Just take notice of the headlines and stop wasting time on any details. You only need to know what propaganda they are pushing at the moment. But never forget that everything you read about our leaders in industry and politics is a show, designed to confuse you, to make you fight your fellow men and to conceal the real enemy of the people, which are the people that control the financial system and their most important weapon: the entire financial system.</p>
    <p class='par' id='tx_08'>The first step in freeing humanity from this parasite, is to break our own indoctrination. Our indoctrination tells us that accumulating money provides security for our families. This is however a lie. It is a scarcity trick. Because we allow a tiny group of people to print money our if thin air, they can and will inflate the money supply, which means that the purchasing power in money is constantly decreasing. Besides that money is like a game of musical chairs. If you succeed (by working hard, selling your company or winning the lottery) to 'secure your future', one or more other families lose that security at the same time. That is the reason religions fight against usury and other financial trickery. Preparing to leave their financial system is therefore a spiritual battle. A fight between good and evil.</p>
    <img src='<?php echo $baseHref; ?>img/Photo Good and Evil 720x400.jpg' class="norm-image"><br>
    <p class='par' id='tx_09'>So the first step is to stop being distracted and losing your indoctrination about money.</p>
    <p class='par' id='tx_10'>Once you really understand the problem of the financial system, the next step is to find a way you overcome it. Basically there are 2 options. The first is to fight it with the tools the system allows. It is however clear that those options don't work. This means that the only real option is a massive exodus from their system.</p>
    <p class='par' id='tx_11'>To make a massive exodus from the financial system possible, we need to provide a vision of the world of abundance, we want to travel to. We also need to provide a vision of how the transition to this world of abundance will look like.
</p>
    <p class='par' id='tx_12'>The people that want to transition to this new system are not revolutionaries, as our goal is not to change the system. We should see ourselves as dreamers. People that dream of a totally different world. We are the people that one day will leave our current system to start living this dream, and with it make our current system obsolete. To make this happen, we need to focus on our dream.</p>
    <p class='par' id='tx_13'>The most important group of people in this transition will be the farmers, fishers and hunters. In the transition everyone will have their tasks based on their skills.</p>
    <p class='par' id='tx_14'>We will have mechanics to keep cars running or to make sure electricity is available and how energy like gas and oil can be made available.</p>
    <p class='par' id='tx_15'>The most important people however are the farmers, fishers and hunters. Without them, leaving the system will be extremely difficult. This is also the reason governments are working together in many agendas to destroy farmers, fishers and hunters. You can only implement a world wide totalitarian state when you control the entire food supply. And you can only walk away from their system when you have enough farmers, fishers and hunters on your side. So this group is pivotal.</p>
    <p class='par' id='tx_16'>This group should also find it easy to abandon their indoctrination, as they have been betrayed by the system over and over again.</p>
    <p class='par' id='tx_17'>With the farmers, fishers and hunters on out side, visualizing the world of abundance and the transition to it will be much easier. It would be ironic if the farmers - that are forced to sell their lands to the government - can use a small portion of the money they received to help envision the world of plenty, and with it create a decent chance to get their land back for free forever, as that is part of our dream as well.</p>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__text" id='tx_18'>18 January 2026</p>
      <p class="blockquote__text" id='tx_19'>Teun van Sambeek MSc, MRE</p>
      <p class="blockquote__text" id='tx_20'>Creator of Abundomy Money</p>
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

            const response = await fetch('<?php echo $baseHref; ?>json/article34.json');
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