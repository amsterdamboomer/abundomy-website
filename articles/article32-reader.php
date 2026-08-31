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
    <span class='title1' id='tx_01'>Geo Politics</span>
    <span class='title4' id='tx_02'>Where the power lies</span>

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
                <td class='imgtext' id='tx_03'>9 January 2026</td>
              </tr>
            </table>
        </div>

        <div class="pdf-wrap">
            <form action="../includes/generate-pdf-r.inc.php" method="POST" target="_blank" style="display:inline;">
                <input type="hidden" name="article_id" value="article32">
                <input type="hidden" name="lang" value="<?php echo $currentLang; ?>">
                <button type="submit" name="generate_pdf" class='login-button pdf-button'>PDF</button>
            </form>
        </div>
    </div>
    <!-- ========================================= -->
    <span class='title3' id='tx_04'>Geo-Political Tensions In The Start Of 2026</span><br>
    <img src='<?php echo $baseHref; ?>img/Photo Iron Bank2 500x346.jpg' class="norm-image">
    <p class='par_italic' id='tx_05' style='text-align: center; width: 100%; display: block;'>The Iron Bank (Game of Thrones)</p>
    <p class='par' id='tx_06'> We are just underway in 2026 and "Trump" kidnapped "Maduro", "Trump" entered two Russian oil tankers and "Trump" announced to leave 31 United Nations and 35 Non-United-Nations international organizations. In their "News"- and talk-shows, Legacy Media are pushing more fear to the public, and experts that claim to understand "Geopolitics" are being interviewed everywhere. Now before diving in all the fear mongering, let us first focus on the term "Geo-politics" and how it is framed by for example "Chat-GTP":</p>
    <blockquote class="blockquote blockquote--bordered">
        <p class="blockquote__text" id='tx_07'><strong>Geopolitics is the study of how geography influences politics, power, and international relations.</strong></p><br>
        <p class="blockquote__text" id='tx_08'>More precisely, it examines how physical and human geographic factors—such as location, natural resources, borders, population distribution, trade routes, climate, and terrain—shape the strategic behavior of states and other political actors.</p><br>
        <p class="blockquote__text" id='tx_09'><strong>CORE ELEMENTS OF GEOPOLITICS</strong></p><br>
        <p class="blockquote__text" id='tx_10'><u>Geographic location</u></p>
        <p class="blockquote__text" id='tx_11'>Proximity to seas, choke points (e.g., straits, canals), rivals, or allies affects security and trade.</p><br>
        <p class="blockquote__text" id='tx_12'><u>Natural resources</u></p>
        <p class="blockquote__text" id='tx_13'>Access to oil, gas, water, minerals, and arable land often drives alliances, conflicts, and foreign policy decisions.</p><br>
        <p class="blockquote__text" id='tx_14'><u>Territory and borders</u></p>
        <p class="blockquote__text" id='tx_15'>Control of land, disputed boundaries, and buffer zones influences military strategy and national identity.</p><br>
        <p class="blockquote__text" id='tx_16'><u>Power projection</u></p>
        <p class="blockquote__text" id='tx_17'>How states use military bases, naval access, airspace, and infrastructure to extend influence beyond their borders.</p><br>
        <p class="blockquote__text" id='tx_18'><u>Demographics and economics</u></p>
        <p class="blockquote__text" id='tx_19'>Population size, labor force, markets, and economic connectivity affect a country’s global leverage.</p><br>
        <p class="blockquote__text" id='tx_20'>WHAT GEOPOLITICS FOCUSSES ON</p><br>
        <p class="blockquote__text" id='tx_21'>- Competition between major powers (e.g., influence over regions or trade routes)</p>
        <p class="blockquote__text" id='tx_22'>- Regional conflicts and spheres of influence</p>
        <p class="blockquote__text" id='tx_23'>- Strategic importance of specific locations (e.g., the South China Sea, the Horn of Africa, the Arctic)</p><br>
        <p class="blockquote__text" id='tx_24'>HOW GLOBAL CHANGES (TECHNOLOGY, CLIMATE CHANGE, ENERGY TRANSITIONS) ALTER POWER BALANCE</p><br>
        <p class="blockquote__text" id='tx_25'>Example:</p>
        <p class="blockquote__text" id='tx_26'>Control of a narrow sea passage such as the Strait of Hormuz is geopolitically significant because a large share of global oil shipments passes through it. Any disruption there can affect global energy prices and international stability.</p><br>
        <p class="blockquote__text" id='tx_27'>IN SHORT: Geopolitics explains why “where” a country is matters as much as “what” it wants, and how geography constrains enables political power on the global stage.</p>
    </blockquote>
    <img src='<?php echo $baseHref; ?>img/Photo Iron Bank Logo 400x340.jpg' style='width: clamp(200px, 40.82vw, 400px); aspect-ratio: 400 / 340; height: auto !important; display: block; margin: auto; object-fit: contain;' />
    <p class='par_italic' id='tx_28' style='text-align: center; width: 100%; display: block;'>Logo of the Iron Bank</p>
    <p class='par' id='tx_29'>Now let me focus on the last sentence: "Geopolitics explains why 'where' a country is matters as much as 'what' it wants, and how geography constrains enables political power on the global stage.</p>    
    <p class='par' id='tx_30'>A true "World of Abundance journalist" understands that almost every news item that is being communicated is loaded with propaganda, because almost everybode - like their parents and many generations before have been carefully indoctrinated. The real powers in the world must have us believe that countries are souvereign nations, with citizens with electorial power. We need to believe, that if a leader of a countrie goes to war with a leader of another country, that these actions represent the will of the people of these countries.</p>    
    <p class='par' id='tx_31'>Everyone already feels something is however fishy, because almost nobody - of the people that anybody knows - want war. People need to be tricked into consenting to war. Tricked by constant indoctrination, propaganda and lies, with the constant fear-based distraction as the main driver of this trickery.</p>    
    <p class='par' id='tx_32'>Power is not in the hands of the people. It never was. Democracy is a system of smoke and mirrors, operated by the only people with real power: The hidden private owners of the central banks. Why do you thinkt there is always money for war, money for propaganda, money for indoctrination and money for cover-ups, keeping most of the most corrupt politicians untouchable? It is because real power needs to be hidden.</p>    
    <p class='par' id='tx_33'>In Game of Thrones we could see this. Again ChatGTP is a handy tool to destill the parts where the "Iron Bank" plays an important role:</p>    
    <blockquote class="blockquote blockquote--bordered">
        <p class="blockquote__text" id='tx_34'>In Game of Thrones, the bank that finances the Lannisters is the Iron Bank of Braavos. It is discussed explicitly in a small number of episodes, with increasing importance in the later seasons. Below are the key episodes and what is discussed in each:</p><br>
        <p class="blockquote__text" id='tx_35'>1. Season 3, Episode 9 – “The Rains of Castamere”</p>
        <p class="blockquote__text" id='tx_36'>Tywin Lannister and the Small Council discusses: Tywin emphasizes that the Iron Bank will always get its due, implying that Lannister power rests not only on military strength but also on financial credibility. The bank is portrayed as politically neutral but ruthlessly pragmatic: it supports whoever can repay debts. The Key idea is introduced: “The Iron Bank will have its due.” This establishes the bank as a major geopolitical and economic force.</p><br>
        <p class="blockquote__text" id='tx_37'>2. Season 4, Episode 6 – “The Laws of Gods and Men”</p>
        <p class="blockquote__text" id='tx_38'>Stannis Baratheon, Davos Seaworth and Salladhor Saan discusses: Stannis is nearly bankrupt and cannot pay his army. Davos argues they must appeal to the Iron Bank because: The Lannisters are deeply in debt. The Iron Bank backs winners and not kings by birth. This reframes the war as a financial contest, not just a military one. Key theme: Legitimacy is less important than creditworthiness.</p><br>
        <p class="blockquote__text" id='tx_39'>3. Season 5, Episode 2 – “The House of Black and White”</p>
        <p class="blockquote__text" id='tx_40'>Stannis Baratheon, Davos Seaworth and Tycho Nestoris (representative of the Iron Bank) discuss: Davos negotiates directly with the Iron Bank in Braavos. He argues that: The Lannisters are poor long-term investments. Stannis is disciplined and reliable. The bank agrees to fund Stannis, marking a shift away from the Lannisters. Geopolitical significance: The Iron Bank openly chooses sides, treating the war as an investment decision.</p><br>
        <p class="blockquote__text" id='tx_41'>4. Season 7, Episode 1 – “Dragonstone”</p>
        <p class="blockquote__text" id='tx_42'>Cersei Lannister, Jaime Lannister and Tycho Nestoris discuss: Cersei repays the entire Lannister debt to the Iron Bank at once. In return, the Iron Bank: Restores its confidence in House Lannister and funds Cersei’s military buildup, including mercenaries (the Golden Company). Core message: Paying debts is a strategic weapon. Financial credibility restores political power.</p><br>
        <p class="blockquote__text" id='tx_43'>The Iron Bank introduced as inevitable creditor. War is framed as a financial competition. The Iron Bank represents geopolitics through finance: Armies require money. Credit determines legitimacy. Power follows solvency, not morality or tradition. This mirrors real-world geopolitics, where financial institutions and debt often shape political outcomes as much as armies do.</p>
     </blockquote>
    <p class='par' id='tx_44'>In the 22years where the Lannisters effectively ran the kingdom in Game of Thrones, none of the Lannisters ever considered the option of taking control of the Iron Bank, which would annihilate the debt of the Lannisters and provide massive wealth as the Iron Bank was able to finance the largest Armies in the world. And since the only money is coins of gold (and other precious metals) and the Iron Bank loans in gold, they must have had a lot of it.</p>
    <p class='par' id='tx_45'>When you "discuss" this topic with ChatGPT you can see clearly how the propaganda and indoctrination works. First chatGPT claims that the bank is impossibly to concur, because of it's geographic position, but also because of the wizardry of people that change faces. Chat GPT also claims that the bank are impartial to morals as they are only interested in profit. Financing wars is highly profitable, so that's why the Iron bank chooses winners. It is funny that chatGTP seems to be very sure why the Iron bank can't be concurred by one of the armies. ChatGPT could have simply said that it doesn't know, as it was never discussed in the series or book. That's why the programmers of ChatGTP have written it in the software, to keep the illusion alive.</p>
    <img src='<?php echo $baseHref; ?>img/Photo Iron Bank 500x283.jpg' class="norm-image">
    <p class='par_italic' id='tx_46' style='text-align: center; width: 100%; display: block;'>The Iron Bank</p>
    <p class='par' id='tx_47'>ChatGTP also claimes that financing losers is not profitable, which doesn't make sense since the bank can seize the collateral from the losers through the victors. The victors are firstly interested in not losing (life or wealth), but - as an attacker - also in "the spoils of war". And - as a good bank will do - take a large chunck out of the spoils when financing both sides. And if the bank see their profit reduced, after a war, it shouldn't finance wars. If a bank however benefits from wars, it would finance both sides - one big and one small - so the war can be short and swift. And with a few dragons, it should be no issue to seize the bank and get all the gold to finance any war and seize the iron Throne.</p>
    <p class='par' id='tx_48'>If we ever want to live in a World of Abundance, we need to be much sharper on the nonsensical propaganda that is constantly fed to us about geopolitics. It is not people that want war, it is the banks that want war. If banks would want peace, no weapon-manufacturer would be financed. We should know by now that the manufacturing of weapons will always be financed, and banks will give themselves certificates and prizes for being sustainable. In what way any war has been sustainable?</p>
    <p class='par' id='tx_49'>So whenever an expert is talking about geopolitics, the first question should be: who is financing the latest developments? The United States has a debt of 33 Trillion dollars, which is increasing because banks will keep lending money. Money to "sponsor" Ukraine of finance the kidnapping of Maduro. If a bank finances the USA, it also finances the kidnapping and all other actions that preceed massive war. If banks were ethical, they wouldn't finance the USA anymore. But they do. Not only because it is profitable (the owners of the central banks already own about everything there is to own on this earth), but because this is the only way for the owners of the central banks to survive. Without their proxy armies and their proxy wars based on fake propaganda, they couldn't distract populations and put fear in them.</p>
    <p class='par' id='tx_50'>It is up to us, to take away the fear of invisible boogeymen and show the World of Abundance, where geopolitics is a word of the past. Forgotten theories to fool you, to make you think the world is complex, while in reality it is quite simple. It will be simple, once you can see through your own indoctrination.</p>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__text" id='tx_51'>9 January 2026</p>
      <p class="blockquote__text" id='tx_52'>Teun van Sambeek MSc, MRE</p>
      <p class="blockquote__text" id='tx_53'>Creator of Abundomy Money</p>
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

            const response = await fetch('<?php echo $baseHref; ?>json/article32.json');
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