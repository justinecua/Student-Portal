let Tags = [];
let EVCB1T_Bottom = document.getElementById('EVCB1T_Bottom');
let EVCB1T_btn = document.getElementById('EVCB1T_btn');
let TagsContainer = document.getElementById('TagsContainer'); 


export function CreateTags(){
    EVCB1T_btn.addEventListener('click', function(){
        let tagInput = EVCB1T_Bottom.value.trim(); 
        if (tagInput.length > 0) {
            EVCB1T_Bottom.value = ''; 
            EVCB1T_Bottom.style.marginBottom = "1%";
            TagsContainer.style.marginBottom = "3%";
            
            Tags.push(tagInput);

            DisplayTag();
            console.log(Tags);
        }
    });

   
}

function DisplayTag(){
    TagsContainer.innerHTML = ''; 

    for(let i = 0; i < Tags.length; i++){
        let Tag = document.createElement('div');
        let DelTag = document.createElement('img');
        DelTag.id = "DelTag";
        DelTag.src = "../../../../../../images/Delete-2--Streamline-Sharp.png";

        Tag.className = "Tag";
        Tag.contentEditable = false;
        Tag.textContent = Tags[i];
        Tag.style.marginRight = "1%";
        Tag.style.marginBottom = "1%";
        Tag.appendChild(DelTag);
        TagsContainer.appendChild(Tag); 

        DelTag.addEventListener('click', function(){
            Tags.splice(i, 1); 
            DisplayTag(); 
            console.log(Tags);
        });
    }

   
}