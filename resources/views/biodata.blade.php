<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>AI Biodata SaaS Builder</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
body{
margin:0;
font-family:Arial;
background:#eef1f5;
}

/* LAYOUT */
.wrapper{
display:flex;
height:100vh;
}

/* LEFT PANEL */
.left{
width:28%;
background:#fff;
padding:15px;
overflow:auto;
border-right:1px solid #ddd;
}

input,select{
width:100%;
padding:10px;
margin:6px 0;
border-radius:8px;
border:1px solid #ccc;
}

button{
width:100%;
padding:10px;
margin-top:10px;
border:none;
border-radius:8px;
color:#fff;
cursor:pointer;
}

.ai{background:#6a1b9a;}
.save{background:#2e7d32;}
.print{background:#c62828;}

/* RIGHT */
.right{
width:72%;
display:flex;
justify-content:center;
align-items:center;
}

/* CARD */
.card{
width:650px;
background:#fff;
border-radius:12px;
overflow:hidden;
box-shadow:0 10px 30px rgba(0,0,0,0.2);
}

/* THEMES */
.red .header{background:#c62828;color:#fff;padding:15px;text-align:center;}
.gold .header{background:gold;color:#000;padding:15px;text-align:center;font-weight:bold;}
.blue .header{background:#1565c0;color:#fff;padding:15px;text-align:center;}

.section{
padding:10px;
border-bottom:1px solid #eee;
}

.photo{
width:120px;
height:140px;
border:2px solid #333;
margin:10px auto;
display:flex;
align-items:center;
justify-content:center;
}

</style>
</head>

<body>

<div class="wrapper">

<!-- LEFT -->
<div class="left">

<h2>AI Biodata Builder</h2>

<select id="theme" onchange="changeTheme()">
<option value="red">Red Classic</option>
<option value="gold">Gold Premium</option>
<option value="blue">Blue Modern</option>
</select>

<input id="name" placeholder="Full Name">
<input id="dob" placeholder="DOB">
<input id="religion" placeholder="Religion">
<input id="caste" placeholder="Caste">
<input id="education" placeholder="Education">
<input id="occupation" placeholder="Occupation">
<input id="city" placeholder="City">

<button class="ai" onclick="aiGenerate()">🤖 AI Generate</button>
<button class="save" onclick="saveData()">💾 Save</button>
<button class="print" onclick="window.print()">📄 PDF Download</button>

</div>

<!-- RIGHT -->
<div class="right">

<div id="card" class="card red">

<div class="header">
<h2 id="title">Marriage Biodata</h2>
</div>

<div class="photo">PHOTO</div>

<div class="section"><b>Name:</b> <span id="o_name"></span></div>
<div class="section"><b>DOB:</b> <span id="o_dob"></span></div>
<div class="section"><b>Religion:</b> <span id="o_religion"></span></div>
<div class="section"><b>Caste:</b> <span id="o_caste"></span></div>
<div class="section"><b>Education:</b> <span id="o_education"></span></div>
<div class="section"><b>Occupation:</b> <span id="o_occupation"></span></div>
<div class="section"><b>City:</b> <span id="o_city"></span></div>

</div>

</div>

</div>

<script>

/* LIVE UPDATE */
function update(){
o_name.innerText = name.value;
o_dob.innerText = dob.value;
o_religion.innerText = religion.value;
o_caste.innerText = caste.value;
o_education.innerText = education.value;
o_occupation.innerText = occupation.value;
o_city.innerText = city.value;
}

document.querySelectorAll("input").forEach(i=>{
i.addEventListener("input", update);
});

/* THEME */
function changeTheme(){
card.className = "card " + theme.value;
}

/* SAVE LOCAL */
function saveData(){
localStorage.setItem("bio", JSON.stringify({
name:name.value,
dob:dob.value,
religion:religion.value,
caste:caste.value,
education:education.value,
occupation:occupation.value,
city:city.value
}));
alert("Saved!");
}

/* LOAD */
window.onload=()=>{
let data = localStorage.getItem("bio");
if(data){
let d = JSON.parse(data);
Object.keys(d).forEach(k=>{
if(document.getElementById(k)) document.getElementById(k).value=d[k];
});
update();
}
}

/* REAL OPENAI CALL */
async function aiGenerate(){

let res = await fetch("/api/ai-biodata",{
method:"POST",
headers:{ "Content-Type":"application/json" },
body: JSON.stringify({
name:name.value,
city:city.value
})
});

let data = await res.json();

/* fill AI result */
name.value = data.name;
dob.value = data.dob;
religion.value = data.religion;
caste.value = data.caste;
education.value = data.education;
occupation.value = data.occupation;
city.value = data.city;

update();
}

</script>

</body>
</html>