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
    <span class='title1' id='tx_01'>IPFS</span>
    <span class='title4' id='tx_02'>What is it?</span>

    <div class="article-header-row">
        <div class="author-wrap">
            <table class="author-table">
              <tr>
                <th rowspan='2'>
                    <img src='<?php echo $baseHref; ?>img/Photo Patrick 140x140.jpg' class="author-photo" />
                </th>
                <td class='imgtext'>PATRICK</td>
              </tr>
              <tr>
                <td class='imgtext' id='tx_03'>14 May 2026</td>
              </tr>
            </table>
        </div>

        <div class="pdf-wrap">
            <form action="../includes/generate-pdf-r.inc.php" method="POST" target="_blank" style="display:inline;">
                <input type="hidden" name="article_id" value="article35">
                <input type="hidden" name="lang" value="<?php echo $currentLang; ?>">
                <button type="submit" name="generate_pdf" class='login-button pdf-button'>PDF</button>
            </form>
        </div>
    </div>
    <!-- ========================================= -->
    <img src='<?php echo $baseHref; ?>img/Photo IPFS 700x334.jpg' class="norm-image"><br>
    <p class='par' id='tx_04'>IPFS stands for InterPlanetary File System. It is a decentralized, peer-to-peer (P2P) network designed to change how data is shared and stored across the internet.
Instead of relying on central servers owned by massive tech corporations, IPFS creates a distributed web where files are stored and served by a network of individual computers around the world. It might be instrumental for Abundomy Money app as it is probably the only and best way to store the profile data and transactions of the users of the app, instead of using a centralized database as is being used at the moment.</p>
    <span class='title3' id='tx_05'>How IPFS Works</span>
     <p class='par' id='tx_06'>To understand IPFS, it is easiest to compare it to the traditional web model:</p>
    <ul>
      <li><p class='par' id='tx_07'>The Traditional Web (Location-Based Addressing): When you visit a website or fetch a file (like https://server.com/filename.pdf), your browser uses HTTP to look up a specific location (IP address or server domain). If that server goes down, is hacked, or censors the file, the data becomes completely inaccessible, even if thousands of people already downloaded copies of it elsewhere.</p></li>
      <li><p class='par' id='tx_08'>The IPFS Web (Content-Based Addressing): IPFS addresses files by what is inside them rather than where they are stored. Every file uploaded to IPFS is given a unique cryptographic fingerprint called a Content Identifier (CID like QmXoypizjW3WknFiJnKLwHCnL72vedxjQkDDP1mXWo6uco). When you request a file, the network finds any nearby computer that already has a copy matching that exact unique fingerprint and securely streams it to you.</p></li>
    </ul>  
    <span class='title3' id='tx_09'>Why Use IPFS?</span>
    <ul>
      <li><p class='par' id='tx_10'>Resilience Against Censorship: Because there is no single central point of failure or master server to shut down, content on IPFS is incredibly difficult for governments, ISPs, or hosting providers to block or censor.</p></li>
      <li><p class='par' id='tx_11'>Persistent Web Archiving: Files on IPFS can live on indefinitely as long as at least one node on the network chooses to pin (keep) the data, preventing websites from disappearing when companies go bankrupt.</p></li>
      <li><p class='par' id='tx_12'>Lower Bandwidth Costs: Instead of downloading a large file from a server across the world, IPFS allows you to fetch pieces of data from a computer sitting right next door in your local network, drastically reducing international bandwidth congestion.</p></li>
      <li><p class='par' id='tx_13'>Perfect Integration with Blockchains: Blockchains are excellent at storing smart contracts and transaction ledger balances, but they are too expensive for storing large data packages like entire HTML web structures, PDFs, images, or audio files. IPFS acts as the decentralized storage layer for web3 applications, storing the actual raw media files while the blockchain stores the tracking tokens or pointers.</p></li>
    </ul>  
    <span class='title3' id='tx_14'>1. Saving and sharing Documents</span>
    <p class='par' id='tx_15'>What you need: An IPFS node (via [Kubo](https://docs.ipfs.tech/install/command-line/) or the desktop app), or a pinning service such as Pinata, web3.storage, or Filebase. These are the steps to run IPFS:</p>
    <ol>
        <li><p class='par_italic'>Install IPFS: brew install ipfs or download the [IPFS Desktop app](https://docs.ipfs.tech/install/ipfs-desktop/)</p></li>
        <li><p class='par_italic'>Start your node: ipfs init → ipfs daemon</p></li>
        <li><p class='par_italic'>Add a file: ipfs add mijn-contract.pdf — you will receive a CID</p></li>
        <li><p class='par_italic'>Pin (crucial!): ipfs pin add [CID] — otherwise the file will be deleted during garbage collection</p></li>
        <li><p class='par_italic'>Share: send the CID or use a public gateway link such as https://ipfs.io/ipfs/[CID]</p></li>
    </ol>  
    <p class='par' id='tx_15'>There is however a problem: If only your node has the file and you go offline, it is temporarily inaccessible. Solution: use a pinning service like Pinata — they keep the file available even when you are offline.</p>
    <p class='par' id='tx_16'>For folders: Use "ipfs add -r ./my-folder/", and the entire folder structure is stored under a single CID.</p>
    <span class='title3' id='tx_17'>2. Storing and Sharing Videos</span>
    <p class='par' id='tx_18'>Videos are large, and IPFS automatically divides them into 256 KB blocks — this enables streaming. These are the steps to store these kind of files</p>
    <ol>
        <li><p class='par_italic'>Add video: Use "ipfs add --chunker=size-262144 video.mp4". IPFS divides this into blocks</p></li>
        <li><p class='par_italic'>Pin via a pinning service (Pinata, Filebase, or Filecoin for cheap storage of large files)</p></li>
        <li><p class='par_italic'>For streaming, use a gateway or hls.js in combination with IPFS</p></li>
    </ol>
    <p class='par' id='tx_19'>For serious video distribution: Combine IPFS with Filecoin (paid, guaranteed storage) or use [**Livepeer**](https://livepeer.org/) for decentralized video transcoding and streaming.</p>
    <p class='par' id='tx_20'>Playback gateway: https://cloudflare-ipfs.com/ipfs/[CID], works directly in the browser.</p>
    <span class='title3' id='tx_21'>3. Building a database on IPFS</span>
    <p class='par' id='tx_22'>IPFS itself is NOT a database. It is a content-addressable file system. For a database, you need a layer on top of IPFS:</p>
    <p class='par_bold' id='tx_23'>Option A - OrbitDB (most commonly used approach)</p>
    <p class='par' id='tx_24'>OrbitDB is a peer-to-peer database built on IPFS. It supports key-value stores, document stores, and logs.</p><br>
    <p class='par_italic'>Import: { createOrbitDB } from '@orbitdb/core'</p><br>
    <p class='par_italic'>import { createHelia } from 'helia'</p><br>
    <p class='par_italic'>const ipfs = await createHelia()</p>
    <p class='par_italic'>const orbitdb = await createOrbitDB({ ipfs })</p>
    <p class='par_italic'>const db = await orbitdb.open('my-database', { type: 'documents' })</p><br>
    <p class='par_italic'>await db.put({ _id: 'user1', name: 'Jan', email: 'jan@example.com' })</p>
    <p class='par_italic'>const result = await db.get('user1')</p><br>
    <p class='par' id='tx_25'>Every write operation is stored as an IPFS block. The database has its own address (an IPFS CID) that you can share so that others can synchronize.</p>
    <span class='title3' id='tx_26'>Option B — Ceramic Network</span>
    <p class='par' id='tx_27'>For more complex data models and identity-based access. Ceramic stores data as streams on IPFS and is suitable for user profiles and social data.</p>
    <span class='title3' id='tx_28'>Option C - Plain JSON files</span>
    <p class='par' id='tx_29'>For simple, read-only datasets: store your data as JSON files on IPFS. Each update creates a new CID (immutable). Use IPNS (IP Name System) to associate a fixed name that always refers to the latest version: ipfs name publish [CID].</p>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__text" id='tx_30'>14 May 2026</p>
      <p class="blockquote__text" id='tx_31'>Patrick</p>
      <p class="blockquote__text" id='tx_32'>Abundomy IT Specialist</p>
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

            const response = await fetch('<?php echo $baseHref; ?>json/article35.json');
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