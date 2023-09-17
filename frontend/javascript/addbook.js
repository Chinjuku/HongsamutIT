//เขียนโค้ดaddbookในนี้นะจ๊ะ
    console.log(document.getElementById('file'));
    const btnadd = document.querySelector(".btns");

    btnadd.addEventListener("click", AddNew);

    function AddNew(){
        const newDiv = document.createElement("div");
        newDiv.classList.add('.nabox');
        document.body.appendChild(newDiv);
    }

