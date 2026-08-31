<?php 
    include_once "../header.php"; 

    // 1. Identify RTL Languages
    $rtlLangs = array('ah', 'ar', 'he', 'fa', 'ur', 'pa', 'pe');
    $isRTL = in_array($currentLang, $rtlLangs);
    $dirAttribute = $isRTL ? 'dir="rtl"' : 'dir="ltr"';
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
                <input type="hidden" name="article_id" value="article05">
                <input type="hidden" name="lang" value="<?php echo $currentLang; ?>">
                <button type="submit" name="generate_pdf" class='login-button pdf-button'>PDF</button>
            </form>
        </div>
    </div>
    <!-- ========================================= -->
    <img src='<?php echo $baseHref; ?>img/Photo FED 700x459.jpg' style='width: clamp(350px, 121.53vw, 700px); aspect-ratio: 700 / 459; height: auto !important; display: block; margin: auto; object-fit: contain;' /><br>
    <p class='par' id='tx_04'></p>
    <span class='title3' id='tx_05'></span><br>
    <p class='par' id='tx_06'></p>
    <img src='<?php echo $baseHref; ?>img/Photo Printing Money 700x272.jpg' style='width: clamp(350px, 121.53vw, 700px); aspect-ratio: 700 / 272; height: auto !important; display: block; margin: auto; object-fit: contain;' /><br>
    <span class='title3' id='tx_07'></span><br>
    <p class='par' id='tx_08'></p>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__text" id='tx_09'></p>
      <p class="blockquote__text" id='tx_10'></p>
      <p class="blockquote__text" id='tx_11'></p>
    </blockquote>
    <p class='par' id='tx_12'></p>
    <p class='par' id='tx_13'></p>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__text" id='tx_14'></p>
      <p class="blockquote__text" id='tx_15'></p>
      <p class="blockquote__text" id='tx_16'></p>
      <p class="blockquote__text" id='tx_17'></p>
    </blockquote>
    <p class='par' id='tx_18'></p>
    <p class='par' id='tx_19'></p>
    <img src='<?php echo $baseHref; ?>img/Photo The Creature From Jekyll Island 317x475.jpg' style='width: clamp(159px, 55.03vw, 317px); aspect-ratio: 317 / 475; height: auto !important; display: block; margin: auto; object-fit: contain;' /><br>
    <span class='title3' id='tx_20'></span><br>
    <p class='par' id='tx_21'></p>
    <span class='title3' id='tx_22'></span><br>
    <p class='par' id='tx_23'></p>
    <p class='par' id='tx_24'></p>
    <p class='par' id='tx_25'></p>
    <span class='title3' id='tx_26'></span>
    <p class='par' id='tx_27'></p>
    <p class='par' id='tx_28'></p>
    <p class='par' id='tx_29'></p>
    <p class='par' id='tx_30'></p>
    <p class='par' id='tx_31'></p>
    <p class='par' id='tx_32'></p>
    <ul>
      <li><a href='https://www.investopedia.com/terms/i/invisiblehand.asp' class='link' target='_blank' id='tx_33'></a></li>
      <li><a href='https://era.org.au/is-the-u-s-federal-reserve-privately-owned/' class='link' target='_blank' id='tx_34'></a></li>
      <li><a href='https://www.investopedia.com/powell-sees-audit-the-fed-push-as-threat-to-central-bank-s-existence-11678911' class='link' target='_blank' id='tx_35'></a></li>
      <li><a href='https://www.investopedia.com/what-to-expect-from-fed-chair-powell-s-testimony-to-congress-this-week-8789476' class='link' target='_blank' id='tx_36'></a></li>
      <li><a href='https://www.abundomy.com/articles/the-creature-from-jekyll-island.php' class='link' target='_blank' id='tx_37'></a></li>
      <li><a href='https://youtu.be/AOk3wBuQNcE?si=PFSgd4lXa1gVhfBO' class='link' target='_blank' id='tx_38'></a></li>
    </ul>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__text" id='tx_33'></p>
      <p class="blockquote__text" id='tx_34'></p>
      <p class="blockquote__text" id='tx_35'></p>
    </blockquote>
    <!-- ========================================= -->
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

            const response = await fetch('<?php echo $baseHref; ?>json/article05.json');
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