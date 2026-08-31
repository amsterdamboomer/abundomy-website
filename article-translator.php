<?php include_once "header.php"; ?>

<div class="main-content" style="padding: 20px; max-width: 1200px; margin: auto; font-family: sans-serif;">
    <h2>1CoinH 68-Language JSON Generator</h2>
    
    <textarea id="htmlInput" style="width:100%; height:120px; margin-bottom:10px;" placeholder="Paste your HTML here..."></textarea>
    
    <div style="background: #fff; padding: 15px; border-radius: 8px; border: 1px solid #ddd; margin-bottom: 20px;">
        <button id="genBtn" onclick="startFullProcess()" style="padding:10px 20px; background:#28a745; color:white; border:none; cursor:pointer; font-weight:bold;">Generate All 68 Languages</button>
        <button id="dlBtn" onclick="downloadJSON()" style="padding:10px 20px; background:#007bff; color:white; border:none; cursor:pointer; font-weight:bold; display:none; margin-left:10px;">Download JSON File</button>
        
        <div style="margin-top: 15px;">
            <div id="statusLabel" style="font-weight:bold; color:#007bff; margin-bottom:5px;">Status: Ready</div>
            <div style="width:100%; background:#eee; height:10px; border-radius:5px; overflow:hidden;">
                <div id="progressBar" style="width:0%; height:100%; background:#28a745; transition: width 0.3s;"></div>
            </div>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <div>
            <h3>Activity Log</h3>
            <textarea id="logArea" readonly style="width:100%; height:300px; background:#333; color:#0f0; font-family:monospace; font-size:12px; padding:10px;"></textarea>
        </div>
        <div>
            <h3>Preview: <select id="previewLang" onchange="updatePreview()"></select></h3>
            <div id="previewBox" style="background:#fffbe6; padding:15px; border:1px solid #ffe58f; height:300px; overflow-y:auto; font-size:14px;"></div>
        </div>
    </div>
</div>

<script>
// //1. Language Definitions
// const langs = {'ah':['am','Amharic'],'ar':['ar','Arabic'],'am':['hy','Armenian'],'az':['az','Azerbaijani'],'by':['be','Belarusian'],'be':['bn','Bengali'],'bo':['bs','Bosnian'],'bg':['bg','Bulgarian'],'ca':['zh-TW','Cantonese'],'ch':['zh-CN','Chinese'],'cz':['cs','Czech'],'se':['sr','Serbian'],'da':['da','Danish'],'de':['de','German'],'en':['en','English'],'es':['es','Spanish'],'fp':['tl','Filipino'],'fr':['fr','French'],'ir':['ga','Irish'],'gr':['el','Greek'],'ha':['ha','Hausa'],'he':['iw','Hebrew'],'hi':['hi','Hindi'],'cr':['hr','Croatian'],'ig':['ig','Igbo'],'in':['id','Indonesian'],'ic':['is','Icelandic'],'it':['it','Italian'],'ja':['ja','Japanese'],'ka':['kk','Kazakh'],'kh':['km','Khmer'],'ki':['rw','Kinyarwanda'],'sh':['sw','Swahili'],'co':['sw','Kituba'],'ko':['ko','Korean'],'kg':['ky','Kyrgyz'],'la':['lo','Lao'],'lv':['lv','Latvian'],'lt':['lt','Lithuanian'],'hu':['hu','Hungarian'],'mg':['mg','Malagasy'],'ma':['mr','Marathi'],'ml':['ms','Malay'],'mo':['mn','Mongolian'],'bu':['my','Burmese'],'ne':['nl','Dutch'],'np':['ne','Nepali'],'no':['no','Norwegian'],'or':['om','Oromo'],'pa':['ps','Pashto'],'pe':['fa','Persian'],'po':['pl','Polish'],'pt':['pt','Portuguese'],'ro':['ro','Romanian'],'ru':['ru','Russian'],'zi':['tn','Tswana'],'al':['sq','Albanian'],'sl':['sl','Slovenian'],'sk':['sk','Slovak'],'so':['so','Somali'],'fi':['fi','Finnish'],'sw':['sv','Swedish'],'ta':['ta','Tamil'],'th':['th','Thai'],'vi':['vi','Vietnamese'],'tu':['tr','Turkish'],'ur':['ur','Urdu'],'yo':['yo','Yoruba']};

// let finalData = {};
// const select = document.getElementById('previewLang');

// // Initialize Dropdown
// Object.keys(langs).forEach(c => select.add(new Option(`${c.toUpperCase()} - ${langs[c][1]}`, c)));

// function log(msg) {
//     const area = document.getElementById('logArea');
//     area.value += "> " + msg + "\n";
//     area.scrollTop = area.scrollHeight;
// }

// // Helper: Split giant paragraphs at the last period before 4000 chars
// function splitTextIntoChunks(text, limit = 4000) {
//     if (text.length <= limit) return [text];
//     let chunks = [];
//     let remaining = text;
//     while (remaining.length > limit) {
//         let splitAt = remaining.lastIndexOf('.', limit);
//         if (splitAt === -1) splitAt = limit;
//         else splitAt += 1;
//         chunks.push(remaining.substring(0, splitAt).trim());
//         remaining = remaining.substring(splitAt).trim();
//     }
//     if (remaining.length > 0) chunks.push(remaining);
//     return chunks;
// }

// // Helper: Call the PHP Proxy
// async function callProxy(text, target) {
//     const formData = new FormData();
//     formData.append('to', target);
//     formData.append('text', text);
//     const response = await fetch('proxy.php', { method: 'POST', body: formData });
//     const result = await response.json();
//     if (result.error) throw new Error(result.error);
//     return result.translated;
// }

// // Helper: Process a batch of short lines
// async function processBatch(text, batchKeys, target, code) {
//     try {
//         let translated = await callProxy(text, target);
//         let splitResults = translated.split(' [x] ');
//         batchKeys.forEach((key, idx) => {
//             finalData[code][key] = splitResults[idx] ? splitResults[idx].trim() : "[Error]";
//         });
//         if (document.getElementById('previewLang').value === code) updatePreview();
//     } catch (e) {
//         log(`Batch Error in ${code}: ${e.message}`);
//         batchKeys.forEach(key => finalData[code][key] = "[Error]");
//     }
//     await new Promise(r => setTimeout(r, 80)); // Reduced delay
// }

// async function startFullProcess() {
//     const html = document.getElementById('htmlInput').value;
//     const regex = /id=['"](tx_\d+)['"].*?>(.*?)<\//gs;
//     let match, keys = [], values = [];

//     while ((match = regex.exec(html)) !== null) {
//         keys.push(match[1]); 
//         values.push(match[2].trim()); 
//     }

//     if (!keys.length) return alert("No tx_ IDs found!");

//     document.getElementById('genBtn').disabled = true;
//     finalData = {};
//     const langCodes = Object.keys(langs);
//     const totalLangs = langCodes.length;
//     const charLimit = 4000;

//     for (let i = 0; i < totalLangs; i++) {
//         const code = langCodes[i];
//         const googleTarget = langs[code][0];
//         const langName = langs[code][1];
//         finalData[code] = {};
        
//         log(`--- Starting ${langName.toUpperCase()} ---`);

//         // NEW: Serbian (se) often fails when batched with [x]. 
//         // We force it to translate line-by-line for 100% accuracy.
//         const useLineByLine = (code === 'se');

//         if (useLineByLine) {
//             for (let v = 0; v < values.length; v++) {
//                 let lineText = values[v];
//                 let lineKey = keys[v];

//                 // Still use the chunker in case a single line is giant
//                 const chunks = splitTextIntoChunks(lineText, charLimit);
//                 let translatedChunks = [];
//                 for (let chunk of chunks) {
//                     try {
//                         let res = await callProxy(chunk, googleTarget);
//                         translatedChunks.push(res);
//                     } catch (e) {
//                         log(`Error in ${langName} at ${lineKey}: ${e.message}`);
//                         translatedChunks.push("[Error]");
//                     }
//                     await new Promise(r => setTimeout(r, 50)); 
//                 }
//                 finalData[code][lineKey] = translatedChunks.join(' ');

//                 // Update UI for Line-by-Line
//                 let progress = Math.round(((i * values.length + v) / (totalLangs * values.length)) * 100);
//                 document.getElementById('statusLabel').innerText = `Lang: ${langName} | Line ${v+1}/${values.length}`;
//                 document.getElementById('progressBar').style.width = progress + "%";
//             }
//         } else {
//             // ORIGINAL BATCHING LOGIC for all other languages
//             let currentBatchText = "";
//             let currentBatchKeys = [];

//             for (let v = 0; v < values.length; v++) {
//                 let lineText = values[v];
//                 let lineKey = keys[v];

//                 if (lineText.length > charLimit) {
//                     if (currentBatchKeys.length > 0) {
//                         await processBatch(currentBatchText, currentBatchKeys, googleTarget, code);
//                         currentBatchText = ""; currentBatchKeys = [];
//                     }
//                     const chunks = splitTextIntoChunks(lineText, charLimit);
//                     let translatedChunks = [];
//                     for (let chunk of chunks) {
//                         let res = await callProxy(chunk, googleTarget);
//                         translatedChunks.push(res);
//                         await new Promise(r => setTimeout(r, 50)); 
//                     }
//                     finalData[code][lineKey] = translatedChunks.join(' ');
//                 } else {
//                     if ((currentBatchText + lineText).length + 5 > charLimit) {
//                         await processBatch(currentBatchText, currentBatchKeys, googleTarget, code);
//                         currentBatchText = lineText;
//                         currentBatchKeys = [lineKey];
//                     } else {
//                         currentBatchText += (currentBatchText === "" ? "" : " [x] ") + lineText;
//                         currentBatchKeys.push(lineKey);
//                     }
//                 }
                
//                 let progress = Math.round(((i * values.length + v) / (totalLangs * values.length)) * 100);
//                 document.getElementById('statusLabel').innerText = `Lang: ${langName} | Batch ${v+1}/${values.length}`;
//                 document.getElementById('progressBar').style.width = progress + "%";
//             }

//             if (currentBatchKeys.length > 0) {
//                 await processBatch(currentBatchText, currentBatchKeys, googleTarget, code);
//             }
//         }

//         await new Promise(r => setTimeout(r, 300)); 
//     }


//     document.getElementById('statusLabel').innerText = "All Languages Complete!";
//     document.getElementById('genBtn').disabled = false;
//     document.getElementById('dlBtn').style.display = 'inline-block';
// }

// function updatePreview() {
//     const sel = select.value;
//     const area = document.getElementById('previewBox');
//     if (!finalData[sel]) return area.innerHTML = "Not processed yet.";
//     let h = `<strong>Preview: ${langs[sel][1]}</strong><hr>`;
//     Object.entries(finalData[sel]).forEach(([id, val]) => h += `<p><b>${id}:</b> ${val}</p>`);
//     area.innerHTML = h;
// }

// function downloadJSON() {
//     const blob = new Blob([JSON.stringify(finalData, null, 4)], {type: "application/json"});
//     const a = document.createElement('a');
//     a.href = URL.createObjectURL(blob);
//     a.download = "article_translations.json";
//     a.click();
// }

// For this run, we focus only on Serbian. 
// Note: If you want Cyrillic, use 'sr'. If you want Latin, use 'sr-Latn'.
const langs = {'se':['sr','Serbian']};

let finalData = {};
const select = document.getElementById('previewLang');
Object.keys(langs).forEach(c => select.add(new Option(`${c.toUpperCase()} - ${langs[c][1]}`, c)));

function log(msg) {
    const area = document.getElementById('logArea');
    area.value += "> " + msg + "\n";
    area.scrollTop = area.scrollHeight;
}

function splitTextIntoChunks(text, limit = 4000) {
    if (text.length <= limit) return [text];
    let chunks = [];
    let remaining = text;
    while (remaining.length > limit) {
        let splitAt = remaining.lastIndexOf('.', limit);
        if (splitAt === -1) splitAt = limit;
        else splitAt += 1;
        chunks.push(remaining.substring(0, splitAt).trim());
        remaining = remaining.substring(splitAt).trim();
    }
    if (remaining.length > 0) chunks.push(remaining);
    return chunks;
}

async function callProxy(text, target) {
    const formData = new FormData();
    formData.append('to', target);
    formData.append('text', text);
    const response = await fetch('proxy.php', { method: 'POST', body: formData });
    const result = await response.json();
    if (result.error) throw new Error(result.error);
    return result.translated;
}

async function startFullProcess() {
    const html = document.getElementById('htmlInput').value;
    const regex = /id=['"](tx_\d+)['"].*?>(.*?)<\//gs;
    let match, keys = [], values = [];

    while ((match = regex.exec(html)) !== null) {
        keys.push(match[1]); 
        values.push(match[2].trim()); 
    }

    if (!keys.length) return alert("No tx_ IDs found!");

    document.getElementById('genBtn').disabled = true;
    finalData = {};
    const langCodes = Object.keys(langs);
    const totalLangs = langCodes.length;
    const charLimit = 4000;

    for (let i = 0; i < totalLangs; i++) {
        const code = langCodes[i];
        const googleTarget = langs[code][0];
        const langName = langs[code][1];
        finalData[code] = {};
        
        log(`--- Starting ${langName.toUpperCase()} (Line-by-Line Mode) ---`);

        for (let v = 0; v < values.length; v++) {
            let lineText = values[v];
            let lineKey = keys[v];

            // Update UI
            document.getElementById('statusLabel').innerText = `Lang: ${langName} | Line: ${v+1}/${values.length}`;
            let progress = Math.round(((i * values.length + v) / (totalLangs * values.length)) * 100);
            document.getElementById('progressBar').style.width = progress + "%";

            // Process every line individually (No batching)
            const chunks = splitTextIntoChunks(lineText, charLimit);
            let translatedChunks = [];
            
            for (let chunk of chunks) {
                try {
                    let res = await callProxy(chunk, googleTarget);
                    translatedChunks.push(res);
                } catch (e) {
                    log(`Error in ${langName} at ${lineKey}: ${e.message}`);
                    translatedChunks.push("[Error]");
                }
                // Small delay between chunks of same line
                await new Promise(r => setTimeout(r, 100)); 
            }
            
            finalData[code][lineKey] = translatedChunks.join(' ');
            
            if (select.value === code) updatePreview();
            
            // Delay between lines to stay safe from Google's rate limits
            await new Promise(r => setTimeout(r, 200)); 
        }

        log(`--- Finished ${langName.toUpperCase()} ---`);
        await new Promise(r => setTimeout(r, 1000)); 
    }

    document.getElementById('statusLabel').innerText = "All Languages Complete!";
    document.getElementById('genBtn').disabled = false;
    document.getElementById('dlBtn').style.display = 'inline-block';
}

function updatePreview() {
    const sel = select.value;
    const area = document.getElementById('previewBox');
    if (!finalData[sel]) return area.innerHTML = "Not processed yet.";
    let h = `<strong>Preview: ${langs[sel][1]}</strong><hr>`;
    Object.entries(finalData[sel]).forEach(([id, val]) => h += `<p><b>${id}:</b> ${val}</p>`);
    area.innerHTML = h;
}

function downloadJSON() {
    const blob = new Blob([JSON.stringify(finalData, null, 4)], {type: "application/json"});
    const a = document.createElement('a');
    a.href = URL.createObjectURL(blob);
    a.download = "article_translations.json";
    a.click();
}

    
</script>

