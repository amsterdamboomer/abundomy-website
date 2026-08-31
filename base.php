<?php 
    // =========================================================================
    // STEP 1: PRE-LOAD MULTI-LINGUAL SEO METADATA (BEFORE HEADER EXECUTIONS)
    // =========================================================================
    $projectRoot = str_replace('\\', '/', dirname(__FILE__));
    
    if (session_status() === PHP_SESSION_NONE) { session_start(); }
    $seoLang = $_SESSION['user_lang'] ?? $_COOKIE['site_lang'] ?? 'en';

    // We target base.json for this page's translations
    $jsonPath = $projectRoot . "/json/base.json";
    $fallbackTitle = "Summary"; // Meaning of tx_02
    $fallbackBrand = "Abundomy"; // Meaning of tx_01

    if (file_exists($jsonPath)) {
        $jsonData = json_decode(file_get_contents($jsonPath), true);
        // Extract localized text for page name (tx_02) and brand name (tx_01)
        $fallbackTitle = $jsonData[$seoLang]['tx_02'] ?? $jsonData['en']['tx_02'] ?? $fallbackTitle;
        $fallbackBrand = $jsonData[$seoLang]['tx_01'] ?? $jsonData['en']['tx_01'] ?? $fallbackBrand;
    }

    // THE SEO STRATEGY FIX: Combines "Page Name | Brand Name" beautifully in every language
    $pageTitle = $fallbackTitle . " | " . $fallbackBrand;
    
    // Provide a safe localized fallback description for search crawlers
    $pageDesc = "Read the summarized core principles of " . $fallbackBrand . " across various structures.";

    // THE METADATA ADDITION: Custom key-phrases explicitly targeting your summary brief
    $pageKeywords = "Economic Summary, Core Principles, Monetary Systems, Structural Reform, Resource Allocation";

    // =========================================================================
    // STEP 2: LOAD MASTER SYSTEM FRAMEWORK
    // =========================================================================
    require_once "header.php";

    // =========================================================================
    // STEP 3: RUNTIME LOGIC & VARIABLE INITIALIZATION (AFTER HEADER ACCESSIBILITY)
    // =========================================================================
    
    // Define the possible values
    $religions = ['ch','mu','hi','bu','sh','ta','yo','si','ju','mi','co','ba','ja','ce','ho','ca','te','dr','af','am','as','au','eu','se','no'];
    $continents = ['af','na','sa','as','au','eu','no'];

    // Pick a random one
    $randomRel = $religions[array_rand($religions)];
    $randomCont = $continents[array_rand($continents)];
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
    <section>
        <div class="reli">
            <span class="title1" id="tx_02"></span>
        </div>

        <div class="pdf-wrap">
            <form action="<?php echo $baseHref; ?>includes/generate-pdf-r.inc.php" method="POST" target="_blank" style="display:inline;">
                <input type="hidden" name="article_id" value="summary">
                <input type="hidden" name="lang" value="<?php echo $currentLang; ?>">
                <div class="button-wrapper">
                    <button type="submit" name="generate_pdf" class="login-button pdf-button">PDF</button>
                </div>
            </form>
        </div>
        <img class="wide-image" id="POW" src="img/001_POW_ch.jpg" alt="placeofworship">
    </section>
    <section>
        <table class="title-table">
            <tr>
                <th class="number-box" id="tx_03">1</th>
                <th class="single-title-box"><p class="title" id="tx_04">Executive Summary</p></th>
            </tr>
        </table>
        <p class="par" id="tx_05">At the heart of global financial systems today lies a fundamental inequity that perpetuates poverty, inequality, and social division. The narrative of scarcity – the idea that there is not enough to go around – is not only misleading, but it also prevents the equitable distribution of resources. Abundomy provides a vision for a financial system that serves all of humanity, creating a world of abundance where resources are shared and distributed fairly. We believe that transforming financial systems to prioritize fairness, transparency, and human well-being is not only possible but essential to building a future where prosperity and justice are accessible to all. To achieve this we propose a comprehensive approach to transforming the financial system by education, building alliances and R&D of new financial systems that serve the common good.</p>
        <br>
        <img class="norm-image" id="VIL" src="img/001_VIL_af.jpg" alt="village">
        <br>
        <table class="title-table">
            <tr>
                <th class="number-box" id="tx_06">2</th>
                <th class="title-box"><p class="title" id="tx_07">Core Challenge: Rebuilding Trust and Equity in Our Financial Systems</p></th>
            </tr>
        </table>
        <p class="par" id="tx_08">For generations, society has adhered to the belief that prosperity is only for those who have 'earned it' through hard work and talent. We have been conditioned to idolize the wealthy few, reinforcing the narrative that success and luxury are the ultimate goals. However, this system leaves behind the majority of people, fueling inequality and fostering competition rather than collaboration. The deeper truth is that the current financial system – although seemingly neutral – is in fact designed to maintain power in the hands of a small elite. Those who control the financial systems have the ability to shape economies, accumulate wealth and influence the distribution of resources, leaving the rest of society at a disadvantage.</p>
        <br>
        <img class="norm-image" id="WED" src="img/001_WED_ch.jpg" alt="wedding">
        <br>
        <table class="title-table">
            <tr>
                <th class="number-box" id="tx_09">3</th>
                <th class="title-box"><p class="title" id="tx_10">Rethinking Money: A Tool of Power, Not Neutrality</p></th>
            </tr>
        </table>
        <p class="par" id="tx_11">Money has long been regarded as a neutral tool for exchange, but this perspective fails to acknowledge the systemic power embedded in its creation and distribution. Central banks and financial institutions control money through loans and credit, mechanisms that perpetuate inflation, rising debt, and economic instability. It has created a financial system that disproportionately benefits the wealthy while leaving the rest of the population behind.</p>
        <p class="list-title" id="tx_12">Key Issues with the Current System:</p>
        <ul class="unordered-list" id="ul1">
            <li class="list-item"><span class="bold-quote" id="tx_13">Wealth Concentration:</span>&nbsp;<span class="quote" id="tx_14">The few control the majority of financial resources, increasing inequality.</span></li>
            <li class="list-item"><span class="bold-quote" id="tx_15">Debt Cycles:</span>&nbsp;<span class="quote" id="tx_16">The reliance on loans and credit creates unsustainable debt burdens for most people.</span></li>
            <li class="list-item"><span class="bold-quote" id="tx_17">Economic Instability:</span>&nbsp;<span class="quote" id="tx_18">A system that benefits only a few, leads to economic instability for the broader population.</span></li>
        </ul>
        <br>
        <img class="norm-image" id="MAR" src="img/001_MAR_af.jpg" alt="market">
        <br>
        <table class="title-table">
            <tr>
                <th class="number-box" id="tx_19">4</th>
                <th class="single-title-box"><p class="title" id="tx_20">Our Vision: A World of Abundance</p></th>
            </tr>
        </table>
        <p class="par" id="tx_21">We envision a financial system that serves the needs of everyone, ensuring equitable access to resources like food, shelter, and opportunity. We reject the myth of scarcity and believe that with the right systems in place, resources can be shared in a way that benefits all people. Instead of living in an "economy", a word implying a world of (artificial) scarcity, we reject that disfunctioning theory. To counter that false narrative, we created a better word to describe what people really aim for: the "Abundomy". A world of abundance that benefits all living creatures in healthy relations. As God intended it.</p>
        <p class="list-title" id="tx_22">Core Components of Our Vision:</p>
        <ul class="unordered-list" id="ul2">
            <li class="list-item"><span class="bold-quote" id="tx_23">Transparency:</span>&nbsp;<span class="quote"  id="tx_24">Everyone should understand how money is created, distributed, and spent.</span></li>
            <li class="list-item"><span class="bold-quote" id="tx_25">Fairness:</span>&nbsp;<span class="quote" id="tx_26">Wealth and resources must be distributed equitably, so that no one is left behind.</span></li>
            <li class="list-item"><span class="bold-quote" id="tx_27">Human Well-being:</span>&nbsp;<span class="quote" id="tx_28">The focus of the economy should shift from profit maximization for the few to improving quality of life for all.</span></li>
        </ul>
        <br>
        <img class="norm-image" id="CHI" src="img/001_CHI_ch.jpg" alt="children">
        <br>
        <table class="title-table">
            <tr>
                <th class="number-box" id="tx_29">5</th>
                <th class="single-title-box"><p class="title" id="tx_30">The Ethical and Moral Foundation of Our Approach</p></th>
            </tr>
        </table>
        <p class="par" id="tx_31">The transformation of financial systems is not merely a technical or economic issue; it is deeply moral and ethical. Across religious and philosophical traditions, there is a shared belief in the dangers of wealth accumulation and the exploitation that can arise from it.</p>
        <p class="list-title" id="tx_32">Key Ethical Teachings:</p>
        <ul class="unordered-list" id="ul3">
            <li class="list-item"><span class="bold-quote" id="tx_33">Christianity:</span>&nbsp;<span class="quote" id="tx_34">'The love of money is the root of all evil' (1 Timothy 6:10), emphasizing spiritual over material growth.</span></li>
            <li class="list-item"><span class="bold-quote" id="tx_35">Islam:</span>&nbsp;<span class="quote" id="tx_36">The prohibition against usury and the emphasis on sharing wealth for the common good.</span></li>
            <li class="list-item"><span class="bold-quote" id="tx_37">Buddhism:</span>&nbsp;<span class="quote" id="tx_38">Advocating for detachment from material wealth and prioritizing mindfulness and compassion.</span></li>
        </ul>
        <p class="par" id="tx_39">These ethical teachings all point toward a system where money serves humanity, not the other way around. Our approach aligns with these moral principles, ensuring that financial systems are ethical, sustainable, and rooted in justice.</p>
        <br>
        <img class="norm-image" id="FOO" src="img/001_FOO_af.jpg" alt="food">
        <br>
        <table class="title-table">
            <tr>
                <th class="number-box" id="tx_40">6</th>
                <th class="single-title-box"><p class="title" id="tx_41">The Problem We Face Today</p></th>
            </tr>
        </table>
        <p class="par" id="tx_42">The current global financial system is built to maintain the concentration of power in the hands of a few. Central banks, multinational corporations, and financial institutions often operate with little transparency, perpetuating inequality and injustice. This system is not neutral – it is a mechanism that enforces the dominance of the wealthy.</p>
        <p class="list-title" id="tx_43">Key Challenges:</p>
        <ul class="unordered-list" id="ul4">
            <li class="list-item"><span class="bold-quote" id="tx_44">Concentration of Power:</span>&nbsp;<span class="quote" id="tx_45">The few control the majority of resources, leading to systemic inequality.</span></li>
            <li class="list-item"><span class="bold-quote" id="tx_46">Scarcity Narrative:</span>&nbsp;<span class="quote" id="tx_47">The belief in scarcity prevents the recognition of abundant resources that could be shared more equitably.</span></li>
            <li class="list-item"><span class="bold-quote" id="tx_48">Lack of Transparency:</span>&nbsp;<span class="quote" id="tx_49">Financial systems often operate behind closed doors, exacerbating distrust and inequality.</span></li>
        </ul>
        <br>
        <img class="norm-image" id="FUN" src="img/001_FUN_ch.jpg" alt="funeral">
        <br>
        <table class="title-table">
            <tr>
                <th class="number-box" id="tx_50">7</th>
                <th class="title-box"><p class="title" id="tx_51">Revealing the Hidden Truth: The Mechanics of Inequality</p></th>
            </tr>
        </table>
        <p class="par" id="tx_52">While much of the public remains unaware of the hidden truths within our financial systems, the tools of modern technology and access to information now provide the opportunity to expose how these systems perpetuate inequality. Financial institutions and governments exert significant influence over global markets in ways that are often opaque and unaccountable. We believe it is essential to uncover these hidden truths, empowering individuals and organizations to demand greater transparency and accountability in financial practices.</p>
        <br>
        <img class="norm-image" id="BUI" src="img/001_BUI_af.jpg" alt="building">
        <br>
        <table class="title-table">
            <tr>
                <th class="number-box" id="tx_53">8</th>
                <th class="title-box"><p class="title" id="tx_54">Our Strategy: Transforming the Financial System</p></th>
            </tr>
        </table>
        <p class="par" id="tx_55">At World of Abundance, we propose a comprehensive approach to transforming the financial system:</p>
        <ul class="unordered-list" id="ul5">
            <li class="list-item"><span class="bold-quote" id="tx_56">Education and Awareness:</span>&nbsp;<span class="quote" id="tx_57">We will educate the public on the mechanics of money creation, the inherent flaws in the current system, and why these flaws perpetuate inequality.</span></li>
            <li class="list-item"><span class="bold-quote" id="tx_58">Advocacy for Reform:</span>&nbsp;<span class="quote" id="tx_59">By building alliances with like-minded organizations, governments, and communities, we will push for systemic change in how financial systems operate.</span></li>
            <li class="list-item"><span class="bold-quote" id="tx_60">New Economic Models:</span>&nbsp;<span class="quote" id="tx_61">We will explore and promote economic models that prioritize transparency, fairness, and sustainability, ensuring that financial systems serve the common good.</span></li>
        </ul>
        <p class="par" id="tx_62">Our goal is to create a global movement that understands the true potential of our financial systems to promote equity and shared prosperity.</p>
        <br>
        <img class="norm-image" id="CEL" src="img/001_CEL_ch.jpg" alt="celebration">
        <br>
        <table class="title-table">
            <tr>
                <th class="number-box" id="tx_63">9</th>
                <th class="title-box"><p class="title" id="tx_64">Implementation: Raising Awareness and Building Alliances</p></th>
            </tr>
        </table>
        <p class="par" id="tx_65">To bring this vision to life, we will:</p>
        <ul class="unordered-list" id="ul6">
            <li class="list-item"><span class="quote" id="tx_66">Launch educational campaigns that provide resources and training to help people understand how financial systems operate and why they need reform.</span></li>
            <li class="list-item"><span class="quote" id="tx_67">Advocate for policy changes that promote transparency, fairness, and the equitable distribution of resources.</span></li>
            <li class="list-item"><span class="quote" id="tx_68">Partner with organizations that share our values and work together to promote systemic change at local, national, and global levels.</span></li>
        </ul>
        <p class="par" id="tx_69">By working collaboratively, we can create the momentum necessary for real change.</p>
        <br>
        <img class="norm-image" id="NAT" src="img/001_NAT_af.jpg" alt="nature">
        <br>
        <table class="title-table">
            <tr>
                <th class="number-box" id="tx_70">10</th>
                <th class="title-box"><p class="title" id="tx_71">Conclusion: A World of Plenty is Possible</p></th>
            </tr>
        </table>
        <p class="par" id="tx_72">The current financial system is not set in stone. It can be transformed into a system that is fair, transparent, and sustainable – one that benefits all of humanity. We can move beyond the myth of scarcity to create a world of abundance, where resources are shared, wealth is equitably distributed, and all people can thrive. We invite you to join us in this mission to reform financial systems and create a future where prosperity, justice, and opportunity are not reserved for the few, but for all.</p>
        <br>
    </section>
    <a href="#top1"><button type="button" class="login-button" id="totop">BACK TO TOP</button></a><br><br>
</div>
<script>
    const siteLanguage = "<?php echo $currentLang; ?>";
    const siteReligion = "<?php echo $randomRel; ?>";
    const siteContinent = "<?php echo $randomCont; ?>";
    const currentLang = "<?php echo $currentLang; ?>";

    async function loadArticle() {
        const overlay = document.getElementById('loading-overlay');
        const msg = document.getElementById('loader-msg');
        
        try {
            // Update the message so you know the script is working
            if (msg) msg.innerHTML = "Loading... ...";

            const response = await fetch('<?php echo $baseHref; ?>json/base.json');
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

    window.onload = function() {
        // 1. Suffix Mappings
        const reliSuffixes = ["ch", "mu", "hi", "bu", "sh", "ta", "yo", "si", "ju", "mi", "co", "ba", "ja", "ce", "ho", "ca", "te", "dr", "af", "am", "as", "au", "eu", "se"];
        const contSuffixes = ["af", "na", "sa", "as", "au", "eu"];

        // 2. Initial Random Values
        let reli = {};
        ["POW", "WED", "CHI", "FUN", "CEL"].forEach(id => reli[id] = Math.floor(Math.random() * 24));

        let cont = {};
        ["VIL", "MAR", "FOO", "BUI", "NAT"].forEach(id => cont[id] = Math.floor(Math.random() * 6));

        // 3. Override if relsel/contsel are NOT "no" (Bypasses random if fixed language selected)
        // Note: Ensure relsel and contsel variables are defined elsewhere in your script
        const reliIdx = reliSuffixes.indexOf(typeof relsel !== 'undefined' ? relsel : "no");
        if (reliIdx !== -1) {
            Object.keys(reli).forEach(key => reli[key] = reliIdx);
        }

        const contIdx = contSuffixes.indexOf(typeof contsel !== 'undefined' ? contsel : "no");
        if (contIdx !== -1) {
            Object.keys(cont).forEach(key => cont[key] = contIdx);
        }

        // 4. Helper Function to Update the DOM
        const updateImg = (id, val, suffixes) => {
            const el = document.getElementById(id);
            if (el) {
                el.src = `img/001_${id}_${suffixes[val]}.jpg`;
            }
        };

        // 5. Execute Updates
        Object.keys(reli).forEach(id => updateImg(id, reli[id], reliSuffixes));
        Object.keys(cont).forEach(id => updateImg(id, cont[id], contSuffixes));
    };


</script>

<?php include_once "footer.php"; ?>
</body>
</html>