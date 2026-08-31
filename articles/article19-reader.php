<?php 
    // =========================================================================
    // STEP 1: PRE-LOAD MULTI-LINGUAL SEO METADATA (BEFORE HEADER EXECUTIONS)
    // =========================================================================
    $projectRoot = str_replace('\\', '/', dirname(__FILE__));
    
    if (session_status() === PHP_SESSION_NONE) { session_start(); }
    $seoLang = $_SESSION['user_lang'] ?? $_COOKIE['site_lang'] ?? 'en';

    // Target the specific translation JSON profile for this article file
    $jsonPath = $projectRoot . "/../json/article19.json";
    
    // FIXED: Set to exactly match your education page index definition for line 19
    $fallbackTitle = "Let's change the Universal Declaration of Human Rights"; 
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
    
    // Explicit dynamic key-phrases matching the specific content of Article 19
    $pageKeywords = "Change Human Rights, Universal Declaration, Human Rights Reform, Legal Amendments, Social Justice, Global Standards";

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
                <input type="hidden" name="article_id" value="article19">
                <input type="hidden" name="lang" value="<?php echo $currentLang; ?>">
                <button type="submit" name="generate_pdf" class='login-button pdf-button'>PDF</button>
            </form>
        </div>
    </div>
    <!-- ========================================= -->
    <span class='title3' id='tx_04'></span><br>
    <img src='<?php echo $baseHref; ?>img/Photo UDHR 700x367.jpg' style='width: clamp(350px, 121.53vw, 700px); aspect-ratio: 700 / 367; height: auto !important; display: block; margin: auto; object-fit: contain;' /><br>
    <p class='par' id='tx_05'></p>
    <p class='par_bold' id='tx_06'></p>
    <p class='par' id='tx_07'></p>
    <p class='par' id='tx_08'></p>
    <p class='par' id='tx_09'></p>
    <p class='par' id='tx_10'></p>
    <p class='par' id='tx_11'></p>
    <p class='par_bold' id='tx_12'></p>
    <p class='par' id='tx_13'></p>
    <p class='par' id='tx_14'></p>
    <p class='par' id='tx_15'></p>
    <p class='par_bold' id='tx_16'></p>
    <p class='par' id='tx_17'></p>


    <span class='title3' id='tx_18'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_19'></p>
      <p class="blockquote__text" id='tx_20'></p>
    </blockquote>
    <p class='par' id='tx_21'></p>
    <ol>
      <li><p class='par' id='tx_22'></p></li>
    </ol>  
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_23'></p>
      <p class="blockquote__text" id='tx_24'></p>
    </blockquote>


    <span class='title3' id='tx_25'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_26'></p>
      <p class="blockquote__text" id='tx_27'></p>
    </blockquote>
    <p class='par' id='tx_28'></p>
    <ol>
      <li><p class='par' id='tx_29'></p></li>
    </ol>  
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_30'></p>
      <p class="blockquote__text" id='tx_31'></p>
    </blockquote>


    <span class='title3' id='tx_32'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_33'></p>
      <p class="blockquote__text" id='tx_34'></p>
    </blockquote>
    <p class='par' id='tx_35'></p>
    <ol>
      <li><p class='par' id='tx_36'></p></li>
      <li><p class='par' id='tx_37'></p></li>
      <li><p class='par' id='tx_38'></p></li>
    </ol>  
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_39'></p>
      <p class="blockquote__text" id='tx_40'></p>
    </blockquote>


    <span class='title3' id='tx_41'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_42'></p>
      <p class="blockquote__text" id='tx_43'></p>
    </blockquote>
    <p class='par' id='tx_44'></p>
    <ol>
      <li><p class='par' id='tx_45'></p></li>
    </ol>  
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_46'></p>
      <p class="blockquote__text" id='tx_47'></p>
    </blockquote>


    <span class='title3' id='tx_48'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_49'></p>
      <p class="blockquote__text" id='tx_50'></p>
    </blockquote>
    <p class='par' id='tx_51'></p>
    <ol>
      <li><p class='par' id='tx_52'></p></li>
    </ol>  
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_53'></p>
      <p class="blockquote__text" id='tx_54'></p>
    </blockquote>


    <span class='title3' id='tx_55'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_56'></p>
      <p class="blockquote__text" id='tx_57'></p>
    </blockquote>
    <p class='par' id='tx_58'></p>
    <ol>
      <li><p class='par' id='tx_59'></p></li>
      <li><p class='par' id='tx_60'></p></li>
      <li><p class='par' id='tx_61'></p></li>
      <li><p class='par' id='tx_62'></p></li>
    </ol>  
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_63'></p>
      <p class="blockquote__text" id='tx_64'></p>
    </blockquote>


    <span class='title3' id='tx_65'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_66'></p>
      <p class="blockquote__text" id='tx_67'></p>
    </blockquote>
    <p class='par' id='tx_68'></p>
    <ol>
      <li><p class='par' id='tx_69'></p></li>
      <li><p class='par' id='tx_70'></p></li>
      <li><p class='par' id='tx_71'></p></li>
    </ol>  
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_72'></p>
      <p class="blockquote__text" id='tx_73'></p>
    </blockquote>


    <span class='title3' id='tx_74'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_75'></p>
      <p class="blockquote__text" id='tx_76'></p>
    </blockquote>
    <p class='par' id='tx_77'></p>
    <ol>
      <li><p class='par' id='tx_78'></p></li>
    </ol>  
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_79'></p>
      <p class="blockquote__text" id='tx_80'></p>
    </blockquote>


    <span class='title3' id='tx_81'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_82'></p>
      <p class="blockquote__text" id='tx_83'></p>
    </blockquote>
    <p class='par' id='tx_84'></p>
    <ol>
      <li><p class='par' id='tx_85'></p></li>
      <li><p class='par' id='tx_86'></p></li>
      <li><p class='par' id='tx_87'></p></li>
      <li><p class='par' id='tx_88'></p></li>
    </ol>  
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_89'></p>
      <p class="blockquote__text" id='tx_90'></p>
    </blockquote>


    <span class='title3' id='tx_91'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_92'></p>
      <p class="blockquote__text" id='tx_93'></p>
    </blockquote>
    <p class='par' id='tx_94'></p>
    <ol>
      <li><p class='par' id='tx_95'></p></li>
      <li><p class='par' id='tx_96'></p></li>
      <li><p class='par' id='tx_97'></p></li>
    </ol>  
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_98'></p>
      <p class="blockquote__text" id='tx_99'></p>
    </blockquote>


    <span class='title3' id='tx_100'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_101'></p>
      <p class="blockquote__text" id='tx_102'></p>
    </blockquote>
    <p class='par' id='tx_103'></p>
    <ol>
      <li><p class='par' id='tx_104'></p></li>
      <li><p class='par' id='tx_105'></p></li>
    </ol>  
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_106'></p>
      <p class="blockquote__text" id='tx_107'></p>
    </blockquote>


    <span class='title3' id='tx_108'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_109'></p>
      <p class="blockquote__text" id='tx_110'></p>
    </blockquote>
    <p class='par' id='tx_111'></p>
    <ol>
      <li><p class='par' id='tx_112'></p></li>
    </ol>  
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_113'></p>
      <p class="blockquote__text" id='tx_114'></p>
    </blockquote>


    <span class='title3' id='tx_115'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_116'></p>
      <p class="blockquote__text" id='tx_117'></p>
    </blockquote>
    <p class='par' id='tx_118'></p>
    <ol>
      <li><p class='par' id='tx_119'></p></li>
    </ol>  
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_120'></p>
      <p class="blockquote__text" id='tx_121'></p>
    </blockquote>


    <span class='title3' id='tx_122'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_123'></p>
      <p class="blockquote__text" id='tx_124'></p>
    </blockquote>
    <p class='par' id='tx_125'></p>
    <ol>
      <li><p class='par' id='tx_126'></p></li>
      <li><p class='par' id='tx_127'></p></li>
      <li><p class='par' id='tx_127'></p></li>
      <li><p class='par' id='tx_129'></p></li>
      <li><p class='par' id='tx_130'></p></li>
    </ol>  
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_131'></p>
      <p class="blockquote__text" id='tx_132'></p>
    </blockquote>


    <span class='title3' id='tx_133'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_134'></p>
      <p class="blockquote__text" id='tx_135'></p>
    </blockquote>
    <p class='par' id='tx_136'></p>
    <ol>
      <li><p class='par' id='tx_137'></p></li>
      <li><p class='par' id='tx_138'></p></li>
      <li><p class='par' id='tx_139'></p></li>
    </ol>  
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_140'></p>
      <p class="blockquote__text" id='tx_141'></p>
    </blockquote>


    <span class='title3' id='tx_142'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_143'></p>
      <p class="blockquote__text" id='tx_144'></p>
    </blockquote>
    <p class='par' id='tx_145'></p>
    <ol>
      <li><p class='par' id='tx_146'></p></li>
      <li><p class='par' id='tx_147'></p></li>
      <li><p class='par' id='tx_148'></p></li>
    </ol>  
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_149'></p>
      <p class="blockquote__text" id='tx_150'></p>
    </blockquote>


    <span class='title3' id='tx_151'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_152'></p>
      <ol>
        <li><p class="blockquote__text" id='tx_153'></p></li>
        <li><p class="blockquote__text" id='tx_154'></p></li>
      </ol>
    </blockquote>
    <p class='par' id='tx_155'></p>
    <ol>
      <li><p class='par' id='tx_156'></p></li>
      <li><p class='par' id='tx_157'></p></li>
      <li><p class='par' id='tx_158'></p></li>
      <li><p class='par' id='tx_159'></p></li>
      <li><p class='par' id='tx_160'></p></li>
    </ol>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_161'></p>
      <ol>
        <li><p class="blockquote__text" id='tx_162'></p></li>
        <li><p class="blockquote__text" id='tx_163'></p></li>
      </ol>
    </blockquote>


    <span class='title3' id='tx_164'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_165'></p>
      <p class="blockquote__text" id='tx_166'></p>
    </blockquote>
    <p class='par' id='tx_167'></p>
    <ol>
      <li><p class='par' id='tx_168'></p></li>
      <li><p class='par' id='tx_169'></p></li>
      <li><p class='par' id='tx_170'></p></li>
      <li><p class='par' id='tx_171'></p></li>
    </ol>  
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_172'></p>
      <p class="blockquote__text" id='tx_173'></p>
    </blockquote>


    <span class='title3' id='tx_174'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_175'></p>
      <ol>
        <li><p class="blockquote__text" id='tx_176'></p></li>
        <li><p class="blockquote__text" id='tx_177'></p></li>
      </ol>
    </blockquote>
    <p class='par' id='tx_178'></p>
    <ol>
      <li><p class='par' id='tx_179'></p></li>
      <li><p class='par' id='tx_180'></p></li>
      <li><p class='par' id='tx_181'></p></li>
      <li><p class='par' id='tx_182'></p></li>
    </ol>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_183'></p>
      <p class="blockquote__text" id='tx_184'></p>
    </blockquote>


    <span class='title3' id='tx_185'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_186'></p>
      <ol>
        <li><p class="blockquote__text" id='tx_187'></p></li>
        <li><p class="blockquote__text" id='tx_188'></p></li>
      </ol>
    </blockquote>
    <p class='par' id='tx_189'></p>
    <ol>
      <li><p class='par' id='tx_190'></p></li>
    </ol>  
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_191'></p>
      <p class="blockquote__text" id='tx_192'></p>
    </blockquote>


    <span class='title3' id='tx_193'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_194'></p>
      <ol>
        <li><p class="blockquote__text" id='tx_195'></p></li>
        <li><p class="blockquote__text" id='tx_196'></p></li>
      </ol>
    </blockquote>
    <p class='par' id='tx_197'></p>
    <ol>
      <li><p class='par' id='tx_198'></p></li>
    </ol>  
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_199'></p>
      <p class="blockquote__text" id='tx_200'></p>
    </blockquote>


     <span class='title3' id='tx_201'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_202'></p>
      <ol>
        <li><p class="blockquote__text" id='tx_203'></p></li>
        <li><p class="blockquote__text" id='tx_204'></p></li>
        <li><p class="blockquote__text" id='tx_205'></p></li>
      </ol>
    </blockquote>
    <p class='par' id='tx_206'></p>
    <ol>
      <li><p class='par' id='tx_207'></p></li>
      <li><p class='par' id='tx_208'></p></li>
      <li><p class='par' id='tx_209'></p></li>
      <li><p class='par' id='tx_210'></p></li>
      <li><p class='par' id='tx_211'></p></li>
    </ol>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_212'></p>
      <ol>
        <li><p class="blockquote__text" id='tx_213'></p></li>
        <li><p class="blockquote__text" id='tx_214'></p></li>
        <li><p class="blockquote__text" id='tx_215'></p></li>
      </ol>
    </blockquote>


    <span class='title3' id='tx_216'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_217'></p>
      <ol>
        <li><p class="blockquote__text" id='tx_218'></p></li>
        <li><p class="blockquote__text" id='tx_219'></p></li>
      </ol>
    </blockquote>
    <p class='par' id='tx_220'></p>
    <ol>
      <li><p class='par' id='tx_221'></p></li>
      <li><p class='par' id='tx_222'></p></li>
      <li><p class='par' id='tx_223'></p></li>
      <li><p class='par' id='tx_224'></p></li>
    </ol>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_225'></p>
      <ol>
        <li><p class="blockquote__text" id='tx_226'></p></li>
        <li><p class="blockquote__text" id='tx_227'></p></li>
        <li><p class="blockquote__text" id='tx_228'></p></li>
      </ol>
    </blockquote>


    <span class='title3' id='tx_229'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_230'></p>
      <p class="blockquote__text" id='tx_231'></p>
    </blockquote>
    <p class='par' id='tx_232'></p>
    <ol>
      <li><p class='par' id='tx_233'></p></li>
      <li><p class='par' id='tx_234'></p></li>
    </ol>  
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_235'></p>
      <p class="blockquote__text" id='tx_236'></p>
    </blockquote>


    <span class='title3' id='tx_237'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_238'></p>
      <p class="blockquote__text" id='tx_239'></p>
    </blockquote>
    <p class='par' id='tx_240'></p>
    <ol>
      <li><p class='par' id='tx_241'></p></li>
      <li><p class='par' id='tx_242'></p></li>
    </ol>  
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_243'></p>
      <p class="blockquote__text" id='tx_244'></p>
    </blockquote>


    <span class='title3' id='tx_245'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_246'></p>
      <ol>
        <li><p class="blockquote__text" id='tx_247'></p></li>
        <li><p class="blockquote__text" id='tx_248'></p></li>
      </ol>
    </blockquote>
    <p class='par' id='tx_249'></p>
    <ol>
      <li><p class='par' id='tx_250'></p></li>
      <li><p class='par' id='tx_251'></p></li>
      <li><p class='par' id='tx_252'></p></li>
      <li><p class='par' id='tx_253'></p></li>
    </ol>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_254'></p>
      <ol>
        <li><p class="blockquote__text" id='tx_255'></p></li>
        <li><p class="blockquote__text" id='tx_256'></p></li>
      </ol>
    </blockquote>

    <span class='title3' id='tx_257'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_258'></p>
      <ol>
        <li><p class="blockquote__text" id='tx_259'></p></li>
        <li><p class="blockquote__text" id='tx_260'></p></li>
        <li><p class="blockquote__text" id='tx_261'></p></li>
      </ol>
    </blockquote>
    <p class='par' id='tx_262'></p>
    <ol>
      <li><p class='par' id='tx_263'></p></li>
      <li><p class='par' id='tx_264'></p></li>
      <li><p class='par' id='tx_265'></p></li>
      <li><p class='par' id='tx_266'></p></li>
      <li><p class='par' id='tx_267'></p></li>
      <li><p class='par' id='tx_268'></p></li>
    </ol>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_269'></p>
      <ol>
        <li><p class="blockquote__text" id='tx_270'></p></li>
        <li><p class="blockquote__text" id='tx_271'></p></li>
        <li><p class="blockquote__text" id='tx_272'></p></li>
      </ol>
    </blockquote>


    <span class='title3' id='tx_273'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_274'></p>
      <p class="blockquote__text" id='tx_275'></p>
    </blockquote>
    <p class='par' id='tx_276'></p>
    <ol>
      <li><p class='par' id='tx_277'></p></li>
      <li><p class='par' id='tx_278'></p></li>
      <li><p class='par' id='tx_279'></p></li>
      <li><p class='par' id='tx_280'></p></li>
    </ol>  
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_281'></p>
      <p class="blockquote__text" id='tx_282'></p>
    </blockquote>


    <span class='title3' id='tx_283'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_284'></p>
      <ol>
        <li><p class="blockquote__text" id='tx_285'></p></li>
        <li><p class="blockquote__text" id='tx_286'></p></li>
        <li><p class="blockquote__text" id='tx_287'></p></li>
        <li><p class="blockquote__text" id='tx_288'></p></li>
      </ol>
    </blockquote>
    <p class='par' id='tx_289'></p>
    <ol>
      <li><p class='par' id='tx_290'></p></li>
      <li><p class='par' id='tx_291'></p></li>
      <li><p class='par' id='tx_292'></p></li>
      <li><p class='par' id='tx_293'></p></li>
    </ol>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_294'></p>
      <ol>
        <li><p class="blockquote__text" id='tx_295'></p></li>
        <li><p class="blockquote__text" id='tx_296'></p></li>
      </ol>
    </blockquote>


    <span class='title3' id='tx_297'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_298'></p>
      <p class="blockquote__text" id='tx_299'></p>
    </blockquote>
    <p class='par' id='tx_300'></p>
    <ol>
      <li><p class='par' id='tx_301'></p></li>
    </ol>  
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_302'></p>
      <p class="blockquote__text" id='tx_303'></p>
    </blockquote>


    <span class='title3' id='tx_304'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_305'></p>
      <ol>
        <li><p class="blockquote__text" id='tx_306'></p></li>
        <li><p class="blockquote__text" id='tx_307'></p></li>
      </ol>
    </blockquote>
    <p class='par' id='tx_308'></p>
    <ol>
      <li><p class='par' id='tx_309'></p></li>
      <li><p class='par' id='tx_310'></p></li>
      <li><p class='par' id='tx_311'></p></li>
    </ol>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_312'></p>
      <ol>
        <li><p class="blockquote__text" id='tx_313'></p></li>
        <li><p class="blockquote__text" id='tx_314'></p></li>
      </ol>
    </blockquote>


    <span class='title3' id='tx_315'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_316'></p>
      <ol>
        <li><p class="blockquote__text" id='tx_317'></p></li>
        <li><p class="blockquote__text" id='tx_318'></p></li>
        <li><p class="blockquote__text" id='tx_319'></p></li>
      </ol>
    </blockquote>
    <p class='par' id='tx_320'></p>
    <ol>
      <li><p class='par' id='tx_321'></p></li>
      <li><p class='par' id='tx_322'></p></li>
      <li><p class='par' id='tx_323'></p></li>
      <li><p class='par' id='tx_324'></p></li>
      <li><p class='par' id='tx_325'></p></li>
    </ol>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_326'></p>
      <ol>
        <li><p class="blockquote__text" id='tx_327'></p></li>
        <li><p class="blockquote__text" id='tx_328'></p></li>
      </ol>
    </blockquote>


    <span class='title3' id='tx_329'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_330'></p>
      <ol>
        <li><p class="blockquote__text" id='tx_331'></p></li>
        <li><p class="blockquote__text" id='tx_332'></p></li>
      </ol>
    </blockquote>
    <p class='par' id='tx_333'></p>
    <ol>
      <li><p class='par' id='tx_334'></p></li>
      <li><p class='par' id='tx_335'></p></li>
      <li><p class='par' id='tx_336'></p></li>
    </ol>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_337'></p>
      <ol>
        <li><p class="blockquote__text" id='tx_338'></p></li>
        <li><p class="blockquote__text" id='tx_339'></p></li>
      </ol>
    </blockquote>


    <span class='title3' id='tx_340'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_341'></p>
      <p class="blockquote__text" id='tx_342'></p>
    </blockquote>
    <p class='par' id='tx_343'></p>
    <ol>
      <li><p class='par' id='tx_344'></p></li>
    </ol>  
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_345'></p>
      <p class="blockquote__text" id='tx_346'></p>
    </blockquote>


    <span class='title3' id='tx_347'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_348'></p>
      <ol>
        <li><p class="blockquote__text" id='tx_349'></p></li>
        <li><p class="blockquote__text" id='tx_350'></p></li>
        <li><p class="blockquote__text" id='tx_351'></p></li>
      </ol>
    </blockquote>
    <p class='par' id='tx_352'></p>
    <ol>
      <li><p class='par' id='tx_353'></p></li>
    </ol>  
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_354'></p>
      <p class="blockquote__text" id='tx_355'></p>
    </blockquote>


    <span class='title3' id='tx_356'></span>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_357'></p>
      <p class="blockquote__text" id='tx_358'></p>
    </blockquote>
    <p class='par' id='tx_359'></p>
    <ol>
      <li><p class='par' id='tx_360'></p></li>
      <li><p class='par' id='tx_361'></p></li>
    </ol>  
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__textb" id='tx_362'></p>
      <p class="blockquote__text" id='tx_363'></p>
    </blockquote>


    <span class='title3' id='tx_364'></span>
    <p class='par' id='tx_365'></p><br>
    

    <p><a href='https://www.abundomy.com/articles/article20-reader.php' target='_blank'><button class='login-button' id='tx_366'></button></a></p>


    <span class='title3' id='tx_367'></span>
    <ul>
      <li><a href='https://www.abundomy.com/articles/article01-reader.php' class='link' target='_blank' id='tx_368'></a></li>
      <li><a href='https://www.abundomy.com/articles/article04-reader.php' class='link' target='_blank' id='tx_369'></a></li>
      <li><a href='https://www.abundomy.com/articles/article04-reader.php' class='link' target='_blank' id='tx_370'></a></li>
    </ul>
    <a id='mailLink' href='mailto:info@abundomy.com?subject=' target='_blank'><button class='login-button' id='tx_371'>Contact Us</button></a>
    <blockquote class="blockquote blockquote--bordered">
      <p class="blockquote__text" id='tx_372'></p>
      <p class="blockquote__text" id='tx_373'></p>
      <p class="blockquote__text" id='tx_374'></p>
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

            const response = await fetch('<?php echo $baseHref; ?>json/article19.json');
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