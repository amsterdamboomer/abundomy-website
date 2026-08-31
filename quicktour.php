<?php 
    // =========================================================================
    // STEP 1: PRE-LOAD MULTI-LINGUAL SEO METADATA (BEFORE HEADER EXECUTIONS)
    // =========================================================================
    $projectRoot = str_replace('\\', '/', dirname(__FILE__));
    
    if (session_status() === PHP_SESSION_NONE) { session_start(); }
    $seoLang = $_SESSION['user_lang'] ?? $_COOKIE['site_lang'] ?? 'en';

    // We target quicktour.json for this page's translations
    $jsonPath = $projectRoot . "/json/quicktour.json";
    $fallbackTitle = "Quick Tour"; 
    $fallbackBrand = "Abundomy";

    if (file_exists($jsonPath)) {
        $jsonData = json_decode(file_get_contents($jsonPath), true);
        // Extract localized text for page name and brand name
        $fallbackTitle = $jsonData[$seoLang]['tx_02'] ?? $jsonData['en']['tx_02'] ?? $fallbackTitle;
        $fallbackBrand = $jsonData[$seoLang]['tx_01'] ?? $jsonData['en']['tx_01'] ?? $fallbackBrand;
    }

    // THE SEO STRATEGY: Combines "Page Name | Brand Name" dynamically in every language
    $pageTitle = $fallbackTitle . " | " . $fallbackBrand;
    
    // Provide a safe localized fallback description for search crawlers
    $pageDesc = "Take the " . $fallbackTitle . " of the " . $fallbackBrand . " movement.";

    // THE METADATA ADDITION: Custom key-phrases explicitly targeting your network groups
    $pageKeywords = "Quick Tour, Movement Strategy, Abundomy, Economic Reform, Debt Forgiveness, Alternative Financial System";

    // =========================================================================
    // STEP 2: LOAD MASTER SYSTEM FRAMEWORK
    // =========================================================================
    include_once "header.php";
?>

<style>
    /* --- QUICK TOUR COLLAPSIBLE STYLES --- */
    
    /* Container for the entire tour */
    .quicktour-container {
        width: 100%;
        max-width: 576px;
        margin: 0 auto;
        padding: clamp(5px, 1.74vw, 10px);
        background-color: var(--background);
        color: var(--white);
        box-sizing: border-box;
    }

    /* Top title styling */
    .top-title-container {
        max-width: 576px;
        width: clamp(288px, 100vw, 576px); 
        margin: 0 auto !important;
        display: block;
        box-sizing: border-box;
        padding: 0 clamp(5px, 1.74vw, 10px);
    }

    .top-title { 
        font-family: 'raleway_regular', sans-serif;
        font-size: clamp(11px, 3.82vw, 22px);
        color: var(--disabled);
        display: block;
        width: 100%;
        box-sizing: border-box;
        text-align: right;
        padding-right: 0;
        padding-left: 0;
    }

    /* RTL support for top title */
    .rtl-mode .top-title {
        text-align: left !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
    }

    /* --- TOGGLE BUTTON STYLES --- */
    .toggle-section {
        margin-bottom: 0px;
        border-bottom: 1px solid rgba(145, 107, 1, 0.2);
    }

    .toggle-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: clamp(8px, 2.78vw, 16px) 0;
        cursor: pointer;
        transition: background 0.2s ease;
        border-radius: 4px;
        gap: 12px;
        user-select: none;
        -webkit-user-select: none;
    }

    .toggle-header:hover {
        background-color: rgba(255, 255, 255, 0.03);
    }

    /* The main title text of each toggle (numbered section) - Level 0 (BOLD) */
    .toggle-title {
        font-family: 'raleway_bold', sans-serif;
        font-size: clamp(14px, 4.86vw, 28px);
        color: var(--text);
        margin: 0;
        flex: 1;
        text-align: left;
        line-height: 1.3;
        font-weight: 900;
    }

    /* RTL override for toggle title */
    .rtl-mode .toggle-title {
        text-align: right;
    }

    /* The + / - indicator - Green and Bold */
    .toggle-indicator {
        font-family: 'raleway_bold', sans-serif;
        font-size: clamp(22px, 7.64vw, 44px);
        color: var(--button) !important;
        flex-shrink: 0;
        width: clamp(28px, 7vw, 40px);
        text-align: center;
        transition: transform 0.3s ease;
        line-height: 1;
        font-weight: 900;
    }

    .toggle-indicator.open {
        transform: rotate(180deg);
    }

    /* --- COLLAPSIBLE CONTENT --- */
    .toggle-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        padding: 0;
    }

    .toggle-content.open {
        max-height: 50000px;
        padding-bottom: clamp(10px, 3.47vw, 20px);
    }

    /* --- INNER COLLAPSIBLE (Sub-sections - Level 1) - BOLD --- */
    .sub-toggle-section {
        border-bottom: none;
        margin-bottom: 0;
        padding-left: 0;
    }

    .sub-toggle-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: clamp(6px, 2.08vw, 12px) 0;
        cursor: pointer;
        transition: background 0.2s ease;
        border-radius: 4px;
        gap: 10px;
        user-select: none;
        -webkit-user-select: none;
    }

    .sub-toggle-header:hover {
        background-color: rgba(255, 255, 255, 0.02);
    }

    /* Level 1 (1.1, 1.2, etc.) - BOLD */
    .sub-toggle-title {
        font-family: 'raleway_bold', sans-serif;
        font-size: clamp(12px, 4.17vw, 24px);
        color: var(--white);
        margin: 0;
        flex: 1;
        text-align: left;
        line-height: 1.3;
        font-weight: 900;
    }

    /* RTL override for sub-toggle title */
    .rtl-mode .sub-toggle-title {
        text-align: right;
    }

    /* Sub-toggle indicator - Green and Bold */
    .sub-toggle-indicator {
        font-family: 'raleway_bold', sans-serif;
        font-size: clamp(18px, 6.25vw, 36px);
        color: var(--button) !important;
        flex-shrink: 0;
        width: clamp(22px, 5.5vw, 32px);
        text-align: center;
        transition: transform 0.3s ease;
        line-height: 1;
        font-weight: 900;
    }

    .sub-toggle-indicator.open {
        transform: rotate(180deg);
    }

    .sub-toggle-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        padding: 0;
    }

    .sub-toggle-content.open {
        max-height: 50000px;
        padding-bottom: clamp(8px, 2.78vw, 16px);
        padding-left: 0;
    }

    /* --- DEEPER NESTING (sub-sub-sections - Level 2: 1.1.1, 1.2.1, etc.) - BOLD --- */
    .subsub-toggle-section {
        border-bottom: none;
        margin-bottom: 0;
        padding-left: 0;
    }

    .subsub-toggle-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: clamp(4px, 1.39vw, 8px) 0;
        cursor: pointer;
        transition: background 0.2s ease;
        border-radius: 4px;
        gap: 8px;
        user-select: none;
        -webkit-user-select: none;
    }

    .subsub-toggle-header:hover {
        background-color: rgba(255, 255, 255, 0.02);
    }

    /* Level 2 (1.1.1, 1.2.1, etc.) - BOLD */
    .subsub-toggle-title {
        font-family: 'raleway_bold', sans-serif;
        font-size: clamp(11px, 3.82vw, 22px);
        color: var(--white);
        margin: 0;
        flex: 1;
        text-align: left;
        line-height: 1.3;
        font-weight: 900;
    }

    .rtl-mode .subsub-toggle-title {
        text-align: right;
    }

    .subsub-toggle-indicator {
        font-family: 'raleway_bold', sans-serif;
        font-size: clamp(16px, 5.56vw, 32px);
        color: var(--button) !important;
        flex-shrink: 0;
        width: clamp(20px, 5vw, 28px);
        text-align: center;
        transition: transform 0.3s ease;
        line-height: 1;
        font-weight: 900;
    }

    .subsub-toggle-indicator.open {
        transform: rotate(180deg);
    }

    .subsub-toggle-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        padding: 0;
    }

    .subsub-toggle-content.open {
        max-height: 50000px;
        padding-bottom: clamp(6px, 2.08vw, 12px);
        padding-left: 0;
    }

    /* --- DEEPEST NESTING (sub-sub-sub-sections - Level 3: 1.2.1.1, 1.2.1.2, etc.) - BOLD --- */
    .subsubsub-toggle-section {
        border-bottom: none;
        margin-bottom: 0;
        padding-left: 0;
    }

    .subsubsub-toggle-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: clamp(3px, 1.04vw, 6px) 0;
        cursor: pointer;
        transition: background 0.2s ease;
        border-radius: 4px;
        gap: 6px;
        user-select: none;
        -webkit-user-select: none;
    }

    .subsubsub-toggle-header:hover {
        background-color: rgba(255, 255, 255, 0.01);
    }

    /* Level 3 (1.2.1.1, 1.2.1.2, etc.) - BOLD */
    .subsubsub-toggle-title {
        font-family: 'raleway_bold', sans-serif;
        font-size: clamp(10px, 3.47vw, 20px);
        color: var(--white);
        margin: 0;
        flex: 1;
        text-align: left;
        line-height: 1.3;
        font-weight: 900;
    }

    .rtl-mode .subsubsub-toggle-title {
        text-align: right;
    }

    .subsubsub-toggle-indicator {
        font-family: 'raleway_bold', sans-serif;
        font-size: clamp(14px, 4.86vw, 28px);
        color: var(--button) !important;
        flex-shrink: 0;
        width: clamp(18px, 4.5vw, 26px);
        text-align: center;
        transition: transform 0.3s ease;
        line-height: 1;
        font-weight: 900;
    }

    .subsubsub-toggle-indicator.open {
        transform: rotate(180deg);
    }

    .subsubsub-toggle-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        padding: 0;
    }

    .subsubsub-toggle-content.open {
        max-height: 50000px;
        padding-bottom: clamp(4px, 1.39vw, 8px);
        padding-left: 0;
    }

    /* --- CONTENT TEXT STYLES - WITH FULL LINE SPACING --- */
    .tour-text {
        font-family: 'raleway_regular', sans-serif;
        font-size: clamp(10px, 3.47vw, 20px);
        color: var(--white);
        line-height: 1.6;
        margin: 0 0 1.2em 0;
        padding-right: 0;
        text-align: left;
    }

    .rtl-mode .tour-text {
        text-align: right;
        padding-right: 0;
        padding-left: 0;
    }

    .tour-text-bold {
        font-family: 'raleway_bold', sans-serif;
        color: var(--text);
    }

    .tour-text-italic {
        font-family: 'raleway_regular', sans-serif;
        font-style: italic;
        color: var(--white);
    }

    /* --- Disclaimer special styling --- */
    .disclaimer-text {
        background-color: rgba(145, 107, 1, 0.08);
        padding: clamp(8px, 2.78vw, 16px);
        border-radius: 4px;
        border-left: 3px solid var(--text);
        margin-bottom: 0.8em;
    }

    .rtl-mode .disclaimer-text {
        border-left: none;
        border-right: 3px solid var(--text);
    }

    .disclaimer-text .tour-text {
        margin-bottom: 0.8em;
    }

    /* --- Quote styling --- */
    .tour-quote {
        font-family: 'raleway_regular', sans-serif;
        font-style: italic;
        font-size: clamp(9px, 3.13vw, 18px);
        color: var(--white);
        line-height: 1.6;
        padding: clamp(8px, 2.78vw, 16px);
        background-color: rgba(255, 255, 255, 0.03);
        border-radius: 4px;
        margin: 0.3em 0 0.8em 0;
        border-left: 3px solid var(--button);
        text-align: left;
    }

    .rtl-mode .tour-quote {
        border-left: none;
        border-right: 3px solid var(--button);
        text-align: right;
    }

    /* --- Join section special --- */
    .join-section {
        background-color: rgba(0, 170, 0, 0.05);
        padding: clamp(12px, 4.17vw, 24px);
        border-radius: 8px;
        border: 1px solid rgba(0, 170, 0, 0.2);
        margin-top: clamp(12px, 4.17vw, 24px);
        text-align: left;
    }

    .join-section .tour-text {
        text-align: left;
        padding-right: 0;
        margin-bottom: 1.2em;
    }

    .rtl-mode .join-section .tour-text {
        text-align: right;
        padding-left: 0;
    }

    /* --- Back to top button --- */
    .back-to-top-wrap {
        display: flex;
        justify-content: center;
        margin-top: clamp(15px, 5.21vw, 30px);
        padding-bottom: clamp(8px, 2.78vw, 16px);
    }

    /* Hide the loader overlay content initially */
    #capture-section {
        display: none;
    }

    /* Force selectable text in the tour */
    .quicktour-container * {
        -webkit-user-select: text !important;
        -moz-user-select: text !important;
        -ms-user-select: text !important;
        user-select: text !important;
    }
</style>

<div class="top-title-container <?php echo $isRTL ? 'rtl-mode' : ''; ?>">
    <span class='top-title' id='tx_01'></span>
</div>

<div id="capture-section" class="selectable-text <?php echo $isRTL ? 'rtl-mode' : ''; ?>" <?php echo $isRTL ? 'dir="rtl"' : 'dir="ltr"'; ?>>
    <div class="quicktour-container" id="quicktour-content">
        <!-- Content will be loaded by JavaScript -->
    </div>
</div>

<script>
    const currentLang = "<?php echo $currentLang; ?>";
    const isRTL = <?php echo $isRTL ? 'true' : 'false'; ?>;

    // Define the toggle structure with content from the text
    const tourData = {
        'tx_02': 'Quick Tour',
        'sections': [
            {
                id: 'section_0',
                titleKey: 'tx_disclaimer_title',
                contentKeys: [
                    'tx_disclaimer_p1',
                    'tx_disclaimer_p2',
                    'tx_disclaimer_p3',
                    'tx_disclaimer_p4',
                    'tx_disclaimer_p5',
                    'tx_disclaimer_p6',
                    'tx_disclaimer_p7',
                    'tx_disclaimer_p8',
                    'tx_disclaimer_p9'
                ],
                type: 'disclaimer'
            },
            {
                id: 'section_1',
                titleKey: 'tx_1_title',
                contentKeys: [],
                subsections: [
                    {
                        id: 'sub_1_1',
                        titleKey: 'tx_1_1_title',
                        contentKeys: [],
                        subsubsections: [
                            {
                                id: 'sub_1_1_1',
                                titleKey: 'tx_1_1_1_title',
                                contentKeys: [
                                    'tx_1_1_1_p1',
                                    'tx_1_1_1_p2'
                                ]
                            },
                            {
                                id: 'sub_1_1_2',
                                titleKey: 'tx_1_1_2_title',
                                contentKeys: [
                                    'tx_1_1_2_p1',
                                    'tx_1_1_2_p2'
                                ]
                            },
                            {
                                id: 'sub_1_1_3',
                                titleKey: 'tx_1_1_3_title',
                                contentKeys: [
                                    'tx_1_1_3_p1',
                                    'tx_1_1_3_p2',
                                    'tx_1_1_3_p3'
                                ]
                            },
                            {
                                id: 'sub_1_1_4',
                                titleKey: 'tx_1_1_4_title',
                                contentKeys: [
                                    'tx_1_1_4_p1',
                                    'tx_1_1_4_p2',
                                    'tx_1_1_4_p3',
                                    'tx_1_1_4_p4'
                                ]
                            },
                            {
                                id: 'sub_1_1_5',
                                titleKey: 'tx_1_1_5_title',
                                contentKeys: [
                                    'tx_1_1_5_p1',
                                    'tx_1_1_5_p2',
                                    'tx_1_1_5_p3',
                                    'tx_1_1_5_p4',
                                    'tx_1_1_5_p5'
                                ]
                            }
                        ]
                    },
                    {
                        id: 'sub_1_2',
                        titleKey: 'tx_1_2_title',
                        contentKeys: [],
                        subsubsections: [
                            {
                                id: 'sub_1_2_1',
                                titleKey: 'tx_1_2_1_title',
                                contentKeys: [],
                                subsubsubsections: [
                                    { 
                                        id: 'sub_1_2_1_1', 
                                        titleKey: 'tx_1_2_1_1_title', 
                                        contentKeys: [
                                            'tx_1_2_1_1_p1',
                                            'tx_1_2_1_1_p2',
                                            'tx_1_2_1_1_p3'
                                        ] 
                                    },
                                    { 
                                        id: 'sub_1_2_1_2', 
                                        titleKey: 'tx_1_2_1_2_title', 
                                        contentKeys: [
                                            'tx_1_2_1_2_p1',
                                            'tx_1_2_1_2_p2',
                                            'tx_1_2_1_2_p3'
                                        ] 
                                    },
                                    { 
                                        id: 'sub_1_2_1_3', 
                                        titleKey: 'tx_1_2_1_3_title', 
                                        contentKeys: [
                                            'tx_1_2_1_3_p1',
                                            'tx_1_2_1_3_p2',
                                            'tx_1_2_1_3_p3'
                                        ] 
                                    },
                                    { 
                                        id: 'sub_1_2_1_4', 
                                        titleKey: 'tx_1_2_1_4_title', 
                                        contentKeys: [
                                            'tx_1_2_1_4_p1',
                                            'tx_1_2_1_4_p2'
                                        ] 
                                    },
                                    { 
                                        id: 'sub_1_2_1_5', 
                                        titleKey: 'tx_1_2_1_5_title', 
                                        contentKeys: [
                                            'tx_1_2_1_5_p1',
                                            'tx_1_2_1_5_p2'
                                        ] 
                                    }
                                ]
                            },
                            {
                                id: 'sub_1_2_2',
                                titleKey: 'tx_1_2_2_title',
                                contentKeys: [],
                                subsubsubsections: [
                                    { 
                                        id: 'sub_1_2_2_1', 
                                        titleKey: 'tx_1_2_2_1_title', 
                                        contentKeys: ['tx_1_2_2_1_p1'] 
                                    },
                                    { 
                                        id: 'sub_1_2_2_2', 
                                        titleKey: 'tx_1_2_2_2_title', 
                                        contentKeys: ['tx_1_2_2_2_p1'] 
                                    },
                                    { 
                                        id: 'sub_1_2_2_3', 
                                        titleKey: 'tx_1_2_2_3_title', 
                                        contentKeys: ['tx_1_2_2_3_p1'] 
                                    },
                                    { 
                                        id: 'sub_1_2_2_4', 
                                        titleKey: 'tx_1_2_2_4_title', 
                                        contentKeys: ['tx_1_2_2_4_p1'] 
                                    },
                                    { 
                                        id: 'sub_1_2_2_5', 
                                        titleKey: 'tx_1_2_2_5_title', 
                                        contentKeys: [
                                            'tx_1_2_2_5_p1',
                                            'tx_1_2_2_5_p2'
                                        ] 
                                    },
                                    { 
                                        id: 'sub_1_2_2_6', 
                                        titleKey: 'tx_1_2_2_6_title', 
                                        contentKeys: ['tx_1_2_2_6_p1'] 
                                    },
                                    { 
                                        id: 'sub_1_2_2_7', 
                                        titleKey: 'tx_1_2_2_7_title', 
                                        contentKeys: ['tx_1_2_2_7_p1'] 
                                    },
                                    { 
                                        id: 'sub_1_2_2_8', 
                                        titleKey: 'tx_1_2_2_8_title', 
                                        contentKeys: [
                                            'tx_1_2_2_8_p1',
                                            'tx_1_2_2_8_p2'
                                        ] 
                                    }
                                ]
                            },
                            {
                                id: 'sub_1_2_3',
                                titleKey: 'tx_1_2_3_title',
                                contentKeys: [
                                    'tx_1_2_3_p1',
                                    'tx_1_2_3_p2'
                                ]
                            }
                        ]
                    },
                    {
                        id: 'sub_1_3',
                        titleKey: 'tx_1_3_title',
                        contentKeys: [
                            'tx_1_3_p1',
                            'tx_1_3_p2',
                            'tx_1_3_p3'
                        ]
                    },
                    {
                        id: 'sub_1_6',
                        titleKey: 'tx_1_6_title',
                        contentKeys: [
                            'tx_1_6_p1',
                            'tx_1_6_p2'
                        ]
                    }
                ]
            },
            {
                id: 'section_2',
                titleKey: 'tx_2_title',
                contentKeys: [
                    'tx_2_p1',
                    'tx_2_p2',
                    'tx_2_p3',
                    'tx_2_p4',
                    'tx_2_p5',
                    'tx_2_p6',
                    'tx_2_p7'
                ]
            },
            {
                id: 'section_3',
                titleKey: 'tx_3_title',
                contentKeys: [],
                subsections: [
                    {
                        id: 'sub_3_1',
                        titleKey: 'tx_3_1_title',
                        contentKeys: [
                            'tx_3_1_p1',
                            'tx_3_1_p2',
                            'tx_3_1_p3',
                            'tx_3_1_p4',
                            'tx_3_1_p5',
                            'tx_3_1_p6'
                        ]
                    },
                    {
                        id: 'sub_3_2',
                        titleKey: 'tx_3_2_title',
                        contentKeys: [
                            'tx_3_2_p1',
                            'tx_3_2_p2',
                            'tx_3_2_p3',
                            'tx_3_2_p4',
                            'tx_3_2_p5',
                            'tx_3_2_p6',
                            'tx_3_2_p7',
                            'tx_3_2_p8'
                        ]
                    },
                    {
                        id: 'sub_3_3',
                        titleKey: 'tx_3_3_title',
                        contentKeys: ['tx_3_3_p1']
                    }
                ]
            },
            {
                id: 'section_4',
                titleKey: 'tx_4_title',
                contentKeys: [],
                subsections: [
                    {
                        id: 'sub_4_1',
                        titleKey: 'tx_4_1_title',
                        contentKeys: [
                            'tx_4_1_p1',
                            'tx_4_1_p2',
                            'tx_4_1_p3',
                            'tx_4_1_p4',
                            'tx_4_1_p5',
                            'tx_4_1_p6',
                            'tx_4_1_p7',
                            'tx_4_1_p8',
                            'tx_4_1_p9'
                        ]
                    },
                    {
                        id: 'sub_4_2',
                        titleKey: 'tx_4_2_title',
                        contentKeys: ['tx_4_2_p1']
                    }
                ]
            },
            {
                id: 'section_5',
                titleKey: 'tx_5_title',
                contentKeys: [],
                subsections: [
                    {
                        id: 'sub_5_1',
                        titleKey: 'tx_5_1_title',
                        contentKeys: [
                            'tx_5_1_p1',
                            'tx_5_1_p2',
                            'tx_5_1_p3'
                        ]
                    },
                    {
                        id: 'sub_5_2',
                        titleKey: 'tx_5_2_title',
                        contentKeys: [
                            'tx_5_2_p1',
                            'tx_5_2_p2'
                        ]
                    },
                    {
                        id: 'sub_5_3',
                        titleKey: 'tx_5_3_title',
                        contentKeys: [
                            'tx_5_3_p1',
                            'tx_5_3_p2',
                            'tx_5_3_p3',
                            'tx_5_3_p4',
                            'tx_5_3_p5'
                        ]
                    },
                    {
                        id: 'sub_5_4',
                        titleKey: 'tx_5_4_title',
                        contentKeys: ['tx_5_4_p1']
                    }
                ]
            },
            {
                id: 'section_6',
                titleKey: 'tx_6_title',
                contentKeys: [],
                subsections: [
                    {
                        id: 'sub_6_1',
                        titleKey: 'tx_6_1_title',
                        contentKeys: [
                            'tx_6_1_p1',
                            'tx_6_1_p2'
                        ]
                    },
                    {
                        id: 'sub_6_2',
                        titleKey: 'tx_6_2_title',
                        contentKeys: ['tx_6_2_p1']
                    }
                ]
            },
            {
                id: 'section_7',
                titleKey: 'tx_7_title',
                contentKeys: ['tx_7_p1'],
                type: 'join'
            }
        ]
    };

    // Recursive function to render nested toggle sections
    function renderToggleSection(section, level = 0) {
        let sectionClass, headerClass, titleClass, indicatorClass, contentClass;

        // Determine the level-specific classes
        if (level === 0) {
            sectionClass = 'toggle-section';
            headerClass = 'toggle-header';
            titleClass = 'toggle-title';
            indicatorClass = 'toggle-indicator';
            contentClass = 'toggle-content';
        } else if (level === 1) {
            sectionClass = 'sub-toggle-section';
            headerClass = 'sub-toggle-header';
            titleClass = 'sub-toggle-title';
            indicatorClass = 'sub-toggle-indicator';
            contentClass = 'sub-toggle-content';
        } else if (level === 2) {
            sectionClass = 'subsub-toggle-section';
            headerClass = 'subsub-toggle-header';
            titleClass = 'subsub-toggle-title';
            indicatorClass = 'subsub-toggle-indicator';
            contentClass = 'subsub-toggle-content';
        } else {
            sectionClass = 'subsubsub-toggle-section';
            headerClass = 'subsubsub-toggle-header';
            titleClass = 'subsubsub-toggle-title';
            indicatorClass = 'subsubsub-toggle-indicator';
            contentClass = 'subsubsub-toggle-content';
        }

        let html = `<div class="${sectionClass}" data-section="${section.id}">`;
        
        // Header (clickable)
        html += `<div class="${headerClass}" onclick="toggleSection('${section.id}')">`;
        html += `<span class="${titleClass}" id="${section.titleKey}">${section.titleKey}</span>`;
        html += `<span class="${indicatorClass}" id="ind_${section.id}">+</span>`;
        html += `</div>`;
        
        // Content
        html += `<div class="${contentClass}" id="cont_${section.id}">`;
        
        // Main content paragraphs
        if (section.contentKeys && section.contentKeys.length > 0) {
            section.contentKeys.forEach(key => {
                html += `<p class="tour-text" id="${key}">${key}</p>`;
            });
        }
        
        // Render subsections recursively
        if (section.subsections) {
            section.subsections.forEach(sub => {
                html += renderToggleSection(sub, level + 1);
            });
        }
        
        if (section.subsubsections) {
            section.subsubsections.forEach(subsub => {
                html += renderToggleSection(subsub, level + 2);
            });
        }
        
        if (section.subsubsubsections) {
            section.subsubsubsections.forEach(subsubsub => {
                html += renderToggleSection(subsubsub, level + 3);
            });
        }
        
        html += `</div>`; // close content
        html += `</div>`; // close section
        
        return html;
    }

    // Toggle function
    function toggleSection(sectionId) {
        const content = document.getElementById('cont_' + sectionId);
        const indicator = document.getElementById('ind_' + sectionId);
        
        if (!content || !indicator) return;
        
        const isOpen = content.classList.contains('open');
        
        if (isOpen) {
            content.classList.remove('open');
            indicator.textContent = '+';
            indicator.classList.remove('open');
        } else {
            content.classList.add('open');
            indicator.textContent = '−';
            indicator.classList.add('open');
        }
    }

    // Recursive function to translate content
    function translateSection(section, content) {
        const translated = { ...section };
        
        // Translate title
        if (content[section.titleKey]) {
            translated.titleKey = content[section.titleKey];
        }
        
        // Translate content paragraphs
        if (section.contentKeys) {
            translated.contentKeys = section.contentKeys.map(key => {
                return content[key] || key;
            });
        }
        
        // Recursively translate subsections
        if (section.subsections) {
            translated.subsections = section.subsections.map(sub => translateSection(sub, content));
        }
        if (section.subsubsections) {
            translated.subsubsections = section.subsubsections.map(sub => translateSection(sub, content));
        }
        if (section.subsubsubsections) {
            translated.subsubsubsections = section.subsubsubsections.map(sub => translateSection(sub, content));
        }
        
        return translated;
    }

    // Main load function
    async function loadQuickTour() {
        const overlay = document.getElementById('loading-overlay');
        const msg = document.getElementById('loader-msg');
        const container = document.getElementById('quicktour-content');
        
        try {
            if (msg) msg.innerHTML = "Loading Quick Tour...";
            
            const response = await fetch('<?php echo $baseHref; ?>json/quicktour.json');
            const data = await response.json();
            const content = data[currentLang] || data['en'];
            
            // Build the HTML
            let html = '';
            
            // Main title
            html += `<span class='title1' id='tx_02'>${content['tx_02'] || 'Quick Tour'}</span><br><br>`;
            
            // Translate all sections
            const translatedSections = tourData.sections.map(section => translateSection(section, content));
            
            // Render all sections
            translatedSections.forEach(section => {
                html += renderToggleSection(section, 0);
            });
            
            // Add back to top button
            html += `<div class="back-to-top-wrap">
                <a href="#top1"><button type="button" class="login-button" id="totop">BACK TO TOP</button></a>
            </div>`;
            
            container.innerHTML = html;
            
            // Update the top title
            const topTitle = document.getElementById('tx_01');
            if (topTitle && content['tx_01']) {
                topTitle.innerHTML = content['tx_01'];
            }
            
        } catch (e) {
            console.error("Error loading quick tour:", e);
            if (msg) msg.innerHTML = "Error loading content.";
            container.innerHTML = '<p class="tour-text" style="color: var(--error); text-align: center;">Failed to load quick tour content. Please try again later.</p>';
        } finally {
            if (overlay) overlay.style.display = 'none';
            const content = document.getElementById('capture-section');
            if (content) content.style.display = 'block';
        }
    }

    // Start loading
    loadQuickTour();

    // Emergency fallback: Hide loader after 8 seconds if still visible
    setTimeout(() => {
        const overlay = document.getElementById('loading-overlay');
        if (overlay && overlay.style.display !== 'none') {
            overlay.style.display = 'none';
            const content = document.getElementById('capture-section');
            if (content) content.style.display = 'block';
        }
    }, 8000);
</script>

<?php include_once "footer.php"; ?>
</body>
</html>