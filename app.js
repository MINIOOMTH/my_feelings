function on() {
    document.getElementById("form-add").style.display = "block";
}

const modal = document.getElementById('form-add');
window.addEventListener('click', ({target}) => {
	if (target === modal) modal.style.display = 'none';
});



// fetch("users.json")
// .then(res=>res.json())
// .then(json=>{
//     // console.log(json)
//     json.users.forEach(item => {
//         output+='<li>'+item.name+'</li>'
//     })
//     list.innerHTML = output
// }).catch(err=>{
//     console.log(err)
// })

const list = document.getElementById('list')

let output = ''
// async / await
async function getusers() {
    const res = await fetch('users.json')
    const json = await res.json() 
    const reversedJson = json.reverse();


    reversedJson.forEach(item => {
        output+= `<li>
        <br> 
         ${item.name || 'ไม่รู้ตัวตน'}
        <br>
        ความในใจ : ${item.conments || 'ไม่รู้ความในใจ'}
        <br>
        <br>
        </li>`
    })
    list.innerHTML = output
}
getusers()