<?php
session_start();
require_once('../tcpdf/tcpdf.php');

// 1. DATA COLLECTION
$articleId = $_POST['article_id'] ?? 'summary';
$L         = $_POST['lang'] ?? 'en';

// 2. BRAND & MONEY MAPS (PHP Version)
$nameMap = array(
    'ah' => 'ትርፍኖሚ', 'ar' => 'وفراقتصاد', 'am' => 'Առատնտես', 'az' => 'Boliqtisad',
    'by' => 'Дабраноміка', 'be' => 'প্রচুরনীতি', 'bo' => 'Izonomija', 'bg' => 'Изономика',
    'ca' => '豐盛濟', 'ch' => '丰盛济', 'cz' => 'Hojnomika', 'se' => 'Изономија',
    'da' => 'Overflomi', 'de' => 'Abundomie', 'en' => 'Abundomy', 'es' => 'Abundomia',
    'fp' => 'Kasagonomiya', 'fr' => 'Abondomie', 'gu' => 'અર્થવિપુલતા', 'ir' => 'Flúirseagar', 'gr' => 'Αφθονομία',
    'ha' => 'Yalwan-Arziki', 'he' => 'שפעכله', 'hi' => 'प्रचुरवार्ता', 'cr' => 'Izonomija',
    'ig' => 'Ụbanomiya', 'in' => 'Limpahnomi', 'ic' => 'Snægtarhag', 'it' => 'Abbondomia',
    'ja' => '豊経済', 'ka' => 'Molnomika', 'kh' => 'ផលសេដ្ឋ', 'ki' => 'Abundomy',
    'sh' => 'Ukwachumi', 'co' => 'Bimvwanomi', 'ko' => '풍경', 'kg' => 'Kennomika',
    'la' => 'ຮ່ວມເສດຖາ', 'lv' => 'Bagātnomika', 'lt' => 'Gausonomika', 'hu' => 'Bőséggazda',
    'mg' => 'Hafarekarena', 'ma' => 'विपुलशास्त्र', 'ml' => 'Limpahnomi', 'mo' => 'Элбэгзасаг',
    'bu' => 'ကျယ်စီးပွား', 'ne' => 'Abundomie', 'np' => 'प्रचुरशास्त्र', 'no' => 'Overflomi',
    'or' => 'Badhaadagdee', 'pa' => 'پریمانیساد', 'pe' => 'فراوانید', 'po' => 'Obfitonomia', 'ps' => 'اِقتصادیَت',
    'pt' => 'Abundomia', 'pu' => 'ਪ੍ਰਚੁਰਤਾ ਅਰਥਚਾਰਾ', 'ro' => 'Abundențonomia', 'ru' => 'Изобиломика', 'zi' => 'Letlotlonomi',
    'al' => 'Bollëkonomi', 'sl' => 'Izonomija', 'sk' => 'Hojnomika', 'so' => 'Barwaaqalaha',
    'fi' => 'Runstalous', 'sw' => 'Överflomi', 'ta' => 'வளதாரம்', 'th' => 'มั่งเศรษฐา',
    'vi' => 'Doi-kinhte', 'tu' => 'Bolnomi', 'ur' => 'فرامعیش', 'yo' => 'Ọpọlowo'
);


$moneyMap = array(
    'ah' => 'ገንዘብ', 'ar' => 'مال', 'am' => 'դրամ', 'az' => 'pul', 'by' => 'грошы', 'be' => 'টাকা',
    'bo' => 'novac', 'bg' => 'пари', 'ca' => '錢', 'ch' => '钱', 'cz' => 'peníze', 'se' => 'novac',
    'da' => 'penge', 'de' => 'Geld', 'en' => 'Money', 'es' => 'dinero', 'fp' => 'pera', 'fr' => 'argent', 'gu' => 'નાણાં',
    'ir' => 'airgead', 'gr' => 'χρήματα', 'ha' => 'kudi', 'he' => 'כסף', 'hi' => 'पैसा', 'cr' => 'novac',
    'ig' => 'ego', 'in' => 'uang', 'ic' => 'peningar', 'it' => 'soldi', 'ja' => 'お金', 'ka' => 'ақsha',
    'kh' => 'លុય', 'ki' => 'amafaranga', 'sh' => 'pesa', 'co' => 'mbongo', 'ko' => '돈', 'kg' => 'акcha',
    'la' => 'เงิน', 'lv' => 'nauda', 'lt' => 'pinigai', 'hu' => 'pénz', 'mg' => 'vola', 'ma' => 'पैसा',
    'ml' => 'wang', 'mo' => 'mөngө', 'bu' => 'pyan', 'ne' => 'Geld', 'np' => 'पैसा', 'no' => 'penger',
    'or' => 'maallaqa', 'pa' => 'پيسې', 'pe' => 'پول', 'po' => 'pieniądze', 'ps' => 'پیسے', 'pt' => 'dinheiro', 'pu' => 'ਪੈਸੇ',
    'ro' => 'bani', 'ru' => 'деньги', 'zi' => 'madi', 'al' => 'para', 'sl' => 'denar', 'sk' => 'peniaze',
    'so' => 'lacag', 'fi' => 'raha', 'sw' => 'pengar', 'ta' => 'பணம்', 'th' => 'เงิน', 'vi' => 'tiền',
    'tu' => 'para', 'ur' => 'پیسہ', 'yo' => 'owo'
);


$brandName = ($nameMap[$L] ?? 'Abundomy') . ' ' . ($moneyMap[$L] ?? 'Money');

// 3. LOAD JSON & RTL LOGIC
$jsonFileName = ($articleId === 'summary') ? 'base' : $articleId;
$jsonPath = __DIR__ . "/../json/{$jsonFileName}.json";

if (!file_exists($jsonPath)) {
    exit("JSON File not found at: " . $jsonPath);
}
$allContent = json_decode(file_get_contents($jsonPath), true);
$content = $allContent[$L] ?? $allContent['en'];


if ($articleId === 'summary') {
    $content['tx_01'] = "Abundomy"; // Title
    $content['tx_02'] = "Summary";  // Subtitle
}

$rtlLangs = array('ar', 'he', 'fa', 'ur', 'pa', 'pe', 'ps');
$isRTL = in_array($L, $rtlLangs);

// 4. LOAD THE GENERIC LAYOUT FROM READER FILE
if ($articleId === 'summary') {
    $readerPath = dirname(__DIR__) . "/base.php";
} else {
    $readerPath = dirname(__DIR__) . "/articles/{$articleId}-reader.php";
}

if (!file_exists($readerPath)) { 
    // Debugging: This will show exactly where it looked
    exit("Reader file not found. Looked in: " . $readerPath); 
}

$rawHtml = file_get_contents($readerPath);

$cleanLayout = preg_replace('/<\?php.*?\?>/ms', '', $rawHtml);
$cleanLayout = preg_replace('/<script.*?>.*?<\/script>/ms', '', $cleanLayout);

// 5. SANITIZE FILENAME
$cleanFilename = preg_replace('/[\/\\\\\:\*\?"\<\>\|]/', '', $content['tx_01']);
if (empty(trim($cleanFilename))) { $cleanFilename = $allContent['en']['tx_01']; }

// 6. PAGE LABELS (Cleaned for RTL)
$pageLabels = array('ah'=>'ገ ጽ','ar'=>'صفحة','am'=>'է ջ','az'=>'S Ə H İ F Ə','by'=>'С Т А Р О Н К А','be'=>'পৃ ष्ठা','bo'=>'S T R A N I C A','bg'=>'С Т Р А Н И Ц А','ca'=>'頁 碼','ch'=>'页 码','cz'=>'S T R A N A','se'=>'С Т Р А Н А','da'=>'S I D E','de'=>'S E I T E','en'=>'P A G E','es'=>'P Á G I N A','fp'=>'P A H I N A','fr'=>'P A G E','gu'=>'પૃ ષ્ઠ','ir'=>'L E A T H A N A C H','gr'=>'Σ Ε Λ Ι Δ Α','ha'=>'S H A F I N','he'=>'עמוד','hi'=>'पृ ष्ठ','cr'=>'S T R A N I C A','ig'=>'I B E','in'=>'H A L A M A N','ic'=>'S Í Ð A','it'=>'P A G I N A','ja'=>'ペ ー ジ','ka'=>'Б Е Т','kh'=>'ទំ ព័ រ','ki'=>'U R U H A N D E','sh'=>'U K U R A S A','co'=>'L U K A S A','ko'=>'페 이 ジ','kg'=>'Б Е Т','la'=>'ໜ້ า','lv'=>'L A P P U S E','lt'=>'P U S L A P I S','hu'=>'O L D A L','mg'=>'P E J Y','ma'=>'पा น','ml'=>'M U K A','mo'=>'Х У У Д А С','bu'=>'စာ မျက် နှာ','ne'=>'P A G I N A','np'=>'पृ ष्ठ','no'=>'S I D E','or'=>'F U U L A','pa'=>'پاڼه','pe'=>'صفحه','po'=>'S T R O N A','ps'=>'ص ف ح ہ','pt'=>'P Á G I N A','pu'=>'ਪੰ ਨਾ','ro'=>'P A G I N Ă','ru'=>'С Т Р А Н И Ц А','zi'=>'T S E B E','al'=>'F A Q E','sl'=>'S T R A N','sk'=>'S T R A N A','so'=>'B O G G A','fi'=>'S I V U','sw'=>'S I D A','ta'=>'ப க் க ம்','th'=>'ห น้ า','vi'=>'T R A N G','tu'=>'S A Y F A','ur'=>'صفحہ','yo'=>'O J U - I W E'
);

$pLabel = $pageLabels[$L] ?? 'P A G E';
if ($isRTL) { $pLabel = str_replace(' ', '', $pLabel); }


// --- 1. FILENAME SANITIZATION ---
$rawFilename = $content['tx_01'] ?? 'Article';
$cleanFilename = preg_replace('/[\/\\\\\:\*\?"\<\>\|]/', '', $rawFilename);
if (empty(trim($cleanFilename))) { 
    $cleanFilename = preg_replace('/[\/\\\\\:\*\?"\<\>\|]/', '', $allContent['en']['tx_01']); 
}

// --- 2. STANDALONE FONT DETECTION FUNCTION ---
function getPdfFont($text, $langCode) {
    if ($langCode == 'ch') return 'cid0cs';
    if ($langCode == 'ca') return 'cid0ct';
    if ($langCode == 'ja') return 'cid0jp';
    if ($langCode == 'ko') return 'cid0kr';
    if ($langCode == 'bu' || preg_match('/[\x{1000}-\x{109F}]/u', $text)) return 'padauk';
    if ($langCode == 'kh' || preg_match('/[\x{1780}-\x{17FF}]/u', $text)) return 'hanuman';
    if ($langCode == 'la' || preg_match('/[\x{0E80}-\x{0EFF}]/u', $text)) return 'phetsarath';
    if (preg_match('/[^\x00-\x7F]/u', $text)) return 'freeserif';
    return 'roboto';
}
$detectedFont = getPdfFont($content['tx_01'], $L);





// --- 3. THE PDF CLASS ---
class ARTICLE_PDF extends TCPDF {
    public $headerData; 
    public $footerBrand; 
    public $pageLabel; 
    public $loc; 
    public $isRTL; 
    public $mainFont;

    // Helper to ensure Bengali and other Unicode scripts use freeserif
    private function getHfFont($text) {
        if ($this->loc == 'ch') return 'cid0cs';
        if ($this->loc == 'ca') return 'cid0ct'; 
        if ($this->loc == 'ja') return 'cid0jp';
        if ($this->loc == 'ko') return 'cid0kr';
        if ($this->loc == 'bu') return 'padauk';
        if ($this->loc == 'kh') return 'hanuman';
        if ($this->loc == 'la') return 'phetsarath';
        // Check for non-Latin characters (Bengali, Hindi, Arabic, etc.)
        if ($this->isRTL || preg_match('/[^\x00-\x7F]/u', $text)) return 'freeserif'; 
        return 'dejavusans';
    }

    public function Header() { //
        $this->setRTL(false);
        $logo = '../img/1CoinH_358x358.png';
        if (file_exists($logo)) { 
            $this->Image($logo, 170, 8, 20, 20, 'PNG'); 
        }
        
        // Detect Font for Title 1
        $hFont1 = $this->getHfFont($this->headerData['tx_01']);
        
        $this->SetY(10); $this->SetX(20);
        $this->SetFont($hFont1, 'B', 18, '', true);
        $this->SetTextColor(145, 107, 1);
        $this->SetDrawColor(145, 107, 1);
        $this->SetLineWidth(0.3);
        $this->setTextRenderingMode(0.3, true, false);
        $this->Cell(145, 10, $this->headerData['tx_01'], 0, 0, ($this->isRTL ? 'R' : 'L'), false, '', 1);

        $this->SetY(20); $this->SetX(20);
        $this->SetFont($hFont1, '', 10, '', true);
        $this->SetTextColor(119, 119, 119);
        // Ensure Title 4 is NOT touched or removed
        $this->Cell(145, 10, $this->headerData['tx_02'], 0, 0, ($this->isRTL ? 'R' : 'L'), false, '', 1);

        $this->Line(20, 30, 190, 30);
        $this->setRTL($this->isRTL);
    }

    public function Footer() {
        $this->setRTL(false);
        $this->SetY(-15);
        $this->Line(20, $this->GetY(), 190, $this->GetY());
        $this->SetTextColor(145, 107, 1);
        
        // Detect Font for Brand and Page Label (Bengali fix)
        $fFont = $this->getHfFont($this->footerBrand);
        $pFont = $this->getHfFont($this->pageLabel);
        
        $this->SetFont($fFont, 'B', 9, '', true);
        $this->SetX(20);
        //$this->Cell(85, 10, $this->footerBrand, 0, 0, 'L');
        $this->Cell(85, 10, $this->footerBrand, 0, 0, 'L', false, 'https://www.abundomy.com');
        
        $this->SetFont($pFont, 'B', 9, '', true);
        $this->SetX(105);
        $pageText = $this->getAliasNumPage().'   |   '.strtoupper($this->pageLabel);
        $this->Cell(85, 10, $pageText, 0, 0, 'R');
        $this->setRTL($this->isRTL);
    }
}

// --- 4. INITIALIZATION ---
$pdf = new ARTICLE_PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// --- ADD THIS FIX BEFORE $pdf->AddPage(); ---
if ($articleId === 'summary') {
    // Override tx_01 and tx_02 to use translated values from $nameMap or $content
    $content['tx_01'] = $nameMap[$L] ?? 'Abundomy'; 
    $content['tx_02'] = $allContent[$L]['tx_02'] ?? 'Summary'; // Ensure JSON has a 'Summary' translation
}





// Map data
$pdf->headerData = $content;
$pdf->loc = $L; $pdf->isRTL = $isRTL; $pdf->footerBrand = $brandName; $pdf->pageLabel = $pLabel;
$pdf->setHeaderFont(array('dejavusans', 'B', 18));
$pdf->setFooterFont(array('dejavusans', 'B', 9));
$pdf->SetMargins(20, 40, 20);
$pdf->SetAutoPageBreak(TRUE, 25);
$pdf->setFontSubsetting(true);
$pdf->AddPage();


// --- 1. RENDER PROFILE IMAGE & NAME ---
if ($articleId !== 'summary') {
    $pdf->setRTL(false); 
    $authorImg = '../img/Photo Teun 100x100.jpg';
    if (file_exists($authorImg)) {
        $imgX = $isRTL ? 178 : 20;
        $circleX = $imgX + 6; // Center of the circle (imgX + half width)
        $pdf->StartTransform();
        $pdf->Circle($circleX, 46, 6, 0, 360, 'CNZ'); 
        $pdf->Image($authorImg, $imgX, 40, 12, 12, 'JPG');
        $pdf->StopTransform();
    }
    $textX = $isRTL ? 20 : 35; 
    $pdf->SetXY($textX, 40);
    $profileFont = 'dejavusans';
    if ($L == 'ch') { $profileFont = 'cid0cs'; }
    elseif ($L == 'ca') { $profileFont = 'cid0ct'; }
    elseif ($L == 'ja') { $profileFont = 'cid0jp'; }
    elseif ($L == 'ko') { $profileFont = 'cid0kr'; }
    elseif ($L == 'bu') { $profileFont = 'padauk'; }
    elseif ($L == 'kh') { $profileFont = 'hanuman'; }
    elseif ($L == 'la') { $profileFont = 'phetsarath'; }
    elseif ($isRTL || (isset($content['tx_03']) && preg_match('/[^\x00-\x7F]/u', $content['tx_03']))) { 
        $profileFont = 'freeserif'; 
    }

    $pdf->SetFont($profileFont, '', 8, '', true);
    $pdf->SetTextColor(145, 107, 1); // Gold
    $dateText = $content['tx_03'] ?? '';
    $pdf->MultiCell(153, 5, "TEUN VAN SAMBEEK\n\n".$dateText, 0, ($isRTL ? 'R' : 'L'), 0, 1);
    $pdf->SetY(65);
    $pdf->setRTL($isRTL); // Re-enable RTL for the main HTML body

} else {
    $pdf->SetY(40);
    $pdf->setRTL($isRTL);
}

// --- 2. THE GENERIC BODY PARSER ---
$align = $isRTL ? 'right' : 'left'; 
$bSide = $isRTL ? 'right' : 'left';
$mainScriptFont = 'dejavusans'; 

if ($L == 'ch') { $mainScriptFont = 'cid0cs'; }
elseif ($L == 'ca') { $mainScriptFont = 'cid0ct'; }
elseif ($L == 'ja') { $mainScriptFont = 'cid0jp'; }
elseif ($L == 'ko') { $mainScriptFont = 'cid0kr'; }
elseif ($L == 'bu') { $mainScriptFont = 'padauk'; }
elseif ($L == 'kh') { $mainScriptFont = 'hanuman'; }
elseif ($L == 'la') { $mainScriptFont = 'phetsarath'; }
// RTL or Unicode Scripts (Bengali, Hindi, Amharic, Tamil, etc.)
elseif ($isRTL || preg_match('/[^\x00-\x7F]/u', $content['tx_04'] ?? $content['tx_01'])) {
    $mainScriptFont = 'freeserif'; 
}

$titleFont = $mainScriptFont;
$bodyFont  = $mainScriptFont;

// Blockquote Font: Helvetica for Roman, otherwise match the main script
$bqFont = ($mainScriptFont == 'dejavusans') ? 'helvetica' : $mainScriptFont;

$css = '<style>
    .title3 { font-family: '.$titleFont.'; color:#916B01; font-size:18pt; font-weight:bold; text-align:'.$align.'; line-height:1; }
    .par { font-family: '.$bodyFont.'; color:#000000; font-size:11pt; line-height:1.2; text-align:'.$align.'; }
    .par_bold { font-family: '.$bodyFont.'; color:#916B01; font-size:11pt; font-weight:bold; text-align:'.$align.'; }
    .par_italic { font-family: '.$bodyFont.'; color:#000000; font-size:11pt; font-weight:bold; font-style:italic; text-align:'.$align.'; }
    .blockquote { background-color:#fcfcfc; border-'.$bSide.':4px solid #916B01; text-align:'.$align.'; }
    .blockquote-text { font-family: '.$bqFont.'; font-style:italic; font-size:10.8pt; line-height:1.2; color:#333333; }
</style>';

$segments = preg_split('/(?=<p|<span|<img|<blockquote|<li|<a)/i', $cleanLayout);


$bqBuffer = []; 

function flushBuffer(&$bqBuffer, &$pdf, $content, $css, $align, $isRTL, $mainScriptFont) {
    if (empty($bqBuffer)) return;
    
    $combinedText = "";
    foreach ($bqBuffer as $id) {
        $text = htmlspecialchars($content[$id], ENT_QUOTES, 'UTF-8');
        $combinedText .= $text . "<br /><br />";
    }
    $combinedText = substr($combinedText, 0, -12);
    
    $bqHtml = '<table class="blockquote" cellpadding="6"><tr><td><span class="blockquote-text">' . $combinedText . '</span></td></tr></table>';

    $estimatedH = $pdf->getStringHeight(170, $combinedText) + 12; 
    if ($pdf->GetY() > ($pdf->getPageHeight() - $estimatedH - 25)) {
        $pdf->AddPage();
    }

    $pdf->writeHTML($css . $bqHtml, false, false, true, false, '');
    $pdf->Ln(11); 
    $bqBuffer = []; 
}


if ($articleId === 'summary') {
    // =========================================================================
    // PART 2: EXCLUSIVE SUMMARY RENDERER
    // =========================================================================
    $segments = preg_split('/(?=<p|<span|<img|<blockquote|<li|<div|<h|<a|<table|<tr|<th|<td)/i', $cleanLayout);
    $pendingNum = ""; 
    $boldBuffer = ""; 

    foreach ($segments as $segment) {
        // --- 1. IMAGE HANDLING (Forced Path Detection) ---
        if (preg_match('/<img[^>]*src=[\'"]([^\'"]+)[\'"]/i', $segment, $imgMatch)) {
            $srcAttr = $imgMatch[1];
            $relativePath = str_replace(['<?php echo $baseHref; ?>', 'https://abundomy.com', 'http://localhost', '/Abundomy/'], '', $srcAttr);
            
            // Build absolute path
            $fullPath = rtrim($projectRoot, '/\\') . DIRECTORY_SEPARATOR . ltrim($relativePath, '/\\');
            
            // If still not found, try a relative fallback
            if (!file_exists($fullPath)) { $fullPath = realpath("../" . ltrim($relativePath, '/\\')); }

            if ($fullPath && file_exists($fullPath)) {
                list($w, $h) = getimagesize($fullPath);
                $targetW = 170; $targetH = $targetW / ($w/$h);
                if (($pdf->GetY() + $targetH) > ($pdf->getPageHeight() - 30)) { $pdf->AddPage(); }
                
                $pdf->Image($fullPath, 20, $pdf->GetY(), $targetW, 0, '', '', '', true, 300, 'C');
                $pdf->Ln($targetH + 10);
            }
            continue;
        }

        // --- 2. TEXT DATA EXTRACTION ---
        if (preg_match('/id\s*=\s*[\'"](tx_\d+)[\'"]/i', $segment, $idMatch)) {
            $id = $idMatch[1];
            if (in_array($id, ['tx_01', 'tx_02'])) continue;
            $text = $content[$id] ?? "";
            if (empty($text)) continue;

            $isNum        = (strpos($segment, 'number-box') !== false);
            $isMainTitle  = (strpos($segment, 'class="title"') !== false || strpos($segment, "class='title'") !== false);
            $isListTitle  = (strpos($segment, 'list-title') !== false);
            $isBoldQuote  = (strpos($segment, 'bold-quote') !== false);
            $isQuote      = (strpos($segment, 'class="quote"') !== false || strpos($segment, "class='quote'") !== false);

            if ($isNum) { $pendingNum = $text; continue; }

            // A. MAIN TITLE
            if ($isMainTitle) {
                $pdf->SetFont($mainScriptFont, 'B', 15);
                $pdf->SetTextColor(145, 107, 1);
                $pdf->SetX(20);
                $pdf->MultiCell(170, 0, ($pendingNum ? $pendingNum." " : "").$text, 0, ($isRTL?'R':'L'), 0, 1);
                $pdf->Ln(4); $pendingNum = "";
            } 
            // B. LIST TITLE (Indented to the left of the bullet)
            elseif ($isListTitle) {
                $pdf->SetFont($mainScriptFont, 'B', 12);
                $pdf->SetTextColor(145, 107, 1);
                $pdf->SetX(25); // Aligns with the Bullet
                $pdf->MultiCell(165, 0, $text, 0, ($isRTL?'R':'L'), 0, 1);
                $pdf->Ln(2);
            }
            // C. THE LIST ITEM (Hanging Indent + Bold Part)
            elseif ($isBoldQuote) {
                $boldBuffer = $text; // Store for the next segment
            }
            elseif ($isQuote) {
                $pdf->SetFont($mainScriptFont, '', 11);
                $pdf->SetTextColor(0, 0, 0);
                
                // Bullet Logic
                $bullet = ($isRTL) ? '•' : '•';
                
                // The Table Trick for Hanging Indents
                // Col 1: Bullet (5mm) | Col 2: Text (165mm)
                $html = '
                <table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="20pt" align="left">'.$bullet.'</td>
                        <td width="450pt"><b>'.$boldBuffer.'</b> '.$text.'</td>
                    </tr>
                </table>';
                
                $pdf->SetX(25); 
                $pdf->writeHTML($html, true, false, true, false, '');
                $pdf->Ln(2);
                $boldBuffer = ""; // Reset
            }
            // D. NORMAL PARAGRAPH
            else {
                $pdf->SetFont($mainScriptFont, '', 11);
                $pdf->SetTextColor(0, 0, 0);
                $pdf->SetX(20);
                $pdf->MultiCell(170, 6, $text, 0, ($isRTL?'R':'L'), 0, 1);
                $pdf->Ln(4);
            }
        }
    }
} else {



    // =========================================================================
    // PART 2: EXCLUSIVE ARTICLE RENDERER (Original Restored Exactly)
    // =========================================================================
    //$segments = preg_split('/(?=<p|<span|<img|<blockquote)/i', $cleanLayout);
    $segments = preg_split('/(?=<p|<span|<img|<blockquote|<li)/i', $cleanLayout);

    foreach ($segments as $segment) {

        // --- A. TEXT HANDLING ---
        if (preg_match('/id=[\'"](tx_\d+)[\'"]/i', $segment, $idMatch)) {
            $id = $idMatch[1];
            if ($id == 'tx_01' || $id == 'tx_02' || $id == 'tx_03') continue;
            
            $text = isset($content[$id]) ? trim($content[$id]) : "";
            if (empty($text)) continue;

            preg_match('/class=[\'"]([^\'"]+)[\'"]/i', $segment, $classMatch);
            $class = $classMatch[1] ?? 'par';

            // --- 1. BLOCKQUOTE BUFFER ---
            if (strpos($class, 'blockquote') !== false) {
                $bqBuffer[] = $id;
                continue; 
            } else {
                flushBuffer($bqBuffer, $pdf, $content, $css, $align, $isRTL, $mainScriptFont);
            }

            // --- 2. THE NESTED LIST FIX ---
            // We check if the segment has <li> OR if the raw HTML shows this ID is inside an <li>
            $isLi = (strpos($segment, '<li') !== false || preg_match('/<li>\s*<p[^>]*id=[\'"]' . $id . '[\'"]/i', $rawHtml));
            
            $isLink    = (strpos($segment, '<a') !== false);
            $isTitle3  = (strpos($class, 'title3') !== false);
            $isParBold = (strpos($class, 'par_bold') !== false);
            $isItalic  = (strpos($class, 'par_italic') !== false);

            $fontSize = $isTitle3 ? 18 : 11;
            $safeText = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
            $displayText = $safeText;

            if ($isLink && preg_match('/href=[\'"]([^\'"]+)[\'"]/i', $segment, $linkMatch)) {
                $url = $linkMatch[1];
                $displayText = '<a href="'.$url.'" style="text-decoration:underline; color:#916B01;">'.$safeText.'</a>';
            }

            // --- 3. FONT & COLOR ---
            if ($isItalic) {
                $pdf->SetFont('helvetica', 'I', $fontSize);
                $pdf->SetTextColor(145, 107, 1);
            } else {
                $fWeight = ($isTitle3 || $isParBold) ? 'B' : '';
                $pdf->SetFont($mainScriptFont, $fWeight, $fontSize);
                $pdf->SetTextColor(($isTitle3 || $isParBold || $isLink) ? 145 : 0, ($isTitle3 || $isParBold || $isLink) ? 107 : 0, ($isTitle3 || $isParBold || $isLink) ? 1 : 0);
            }

            // --- 4. RENDERING ---
            if ($isLi) {
                // The Table trick ensures bullets appear even if split mid-tag
                $listHtml = '
                <table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="25"></td>
                        <td width="20" align="left">•</td>
                        <td width="460">'.$displayText.'</td>
                    </tr>
                </table>';
                $pdf->writeHTML($listHtml, true, false, true, false, '');
            } else {
                if ($isItalic) {
                    if ($isRTL) { $pdf->SetRightMargin(45); } else { $pdf->SetLeftMargin(35); $pdf->SetRightMargin(30); }
                    $pdf->SetX(35);
                } else {
                    if ($isRTL) { $pdf->SetRightMargin(30); } else { $pdf->SetLeftMargin(20); $pdf->SetRightMargin(30); }
                    $pdf->SetX(20);
                }
                $iStyle = $isItalic ? 'font-style:italic; color:#916B01;' : '';
                $pdf->writeHTML('<span class="'.$class.'" style="'.$iStyle.'">'.$displayText.'</span>', true, false, true, false, '');
            }

            // --- 5. CLEANUP ---
            $pdf->SetLeftMargin(20); $pdf->SetRightMargin(20);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->Ln($isLi ? 1 : ($isTitle3 || $isParBold ? 2 : 4));
        }


        // --- B. IMAGE HANDLING (Restored) ---
        // --- IMPROVED IMAGE LOGIC (Ratio-aware & Smart Scaling) ---
        if (preg_match('/<img[^>]*src=[\'"]([^\'"]+)[\'"]/i', $segment, $imgMatch)) {
            flushBuffer($bqBuffer, $pdf, $content, $css, $align, $isRTL, $mainScriptFont);
            
            $srcAttr = $imgMatch[1];
            $relativePath = str_replace(['<?php echo $baseHref; ?>', 'https://abundomy.com', 'http://localhost', '/Abundomy/'], '', $srcAttr);
            $fullPath = rtrim($projectRoot, '/\\') . DIRECTORY_SEPARATOR . ltrim($relativePath, '/\\');
            if (!file_exists($fullPath)) { $fullPath = realpath("../" . ltrim($relativePath, '/\\')); }

            if ($fullPath && file_exists($fullPath)) {
                list($w, $h) = getimagesize($fullPath);
                $ratio = $w / $h;

                // 1. Calculate Initial Size (Max Height = 50% of Page Width)
                // Page Width is 210mm. 50% = 105mm.
                $maxInitialH = 105; 
                $targetH = $maxInitialH;
                $targetW = $targetH * $ratio;

                // Ensure it doesn't exceed the page margins width-wise (170mm)
                if ($targetW > 170) {
                    $targetW = 170;
                    $targetH = $targetW / $ratio;
                }
                
                $originalH = $targetH; // Store for 30% comparison

                // 2. Check Available Space on Current Page
                // Margin bottom is 25mm.
                $availableSpace = $pdf->getPageHeight() - $pdf->GetY() - 25;

                if ($targetH > $availableSpace) {
                    // Calculate if a reduction can keep it on this page
                    $reducedH = $availableSpace;
                    
                    // Rule: If reduced size is > 40% of original, keep it here.
                    if ($reducedH > ($originalH * 0.4)) {
                        $targetH = $reducedH;
                        $targetW = $targetH * $ratio;
                    } else {
                        // Else: Skip to next page and use the first calculated size
                        $pdf->AddPage();
                        $targetH = $originalH;
                        $targetW = $targetH * $ratio;
                    }
                }

                // 3. Render Centered Image
                $pdf->SetX(20);
                // The 'C' parameter in Image() handles horizontal centering
                $pdf->Image($fullPath, 20, $pdf->GetY(), $targetW, $targetH, '', '', '', true, 300, 'C');
                $pdf->Ln($targetH + 10);
            }
        }
    }
}


// --- 1. FINAL BUFFER FLUSH ---
flushBuffer($bqBuffer, $pdf, $content, $css, $align, $isRTL, $mainScriptFont);

// --- 2. THE ULTIMATE PAGE KILLER ---
$totalPages = $pdf->getNumPages();
if ($totalPages > 1) {
    $pdf->setPage($totalPages);
    $currentY = $pdf->getY();
    
    /**
     * LOGIC: 
     * 1. If Y > 275: The pen hit the bottom of the page on a trailing space/newline.
     * 2. If Y < 60: The page was created but no body text was written.
     */
    if ($currentY > 275 || $currentY < 60) {
        $pdf->deletePage($totalPages);
    }
}

// --- 3. OUTPUT ---
if (ob_get_length()) ob_end_clean();
$pdfData = $pdf->Output($cleanFilename.'.pdf', 'S');
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="'.$cleanFilename.'.pdf"');
header('Content-Length: ' . strlen($pdfData));
echo $pdfData;
exit();
