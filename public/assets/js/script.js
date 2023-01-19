// DATATABLE
$(document).ready(function() {
    $('#example1,#example2,#example3,#example4,#example6').DataTable({
      responsive: true
    }).columns.adjust().responsive.recalc();
});


//Dashboard TABLES
//=====================================================================
//Form 1 Select
// const form1 = document.forms['form1'];

//select Element fron dashboard
// const btn_add_show_modal = document.querySelectorAll('.add_show_modal');
// const btn_edit_show_modal = document.querySelectorAll('.edit_show_modal');
// const btn_update = document.querySelector('#update');
// const btn_add = document.querySelector('#add');
// const btn_create = document.querySelector('#create');
// const inputs_form_id = document.querySelector('#inputs_form_id');
// const anotherdiv = document.querySelector('#anotherdiv');
// const btn_close_all = document.querySelectorAll('.close');

// //Select Element div inputs Modal
// const name_form_modal = document.querySelector('#name');
// const date_birthday_form_modal = document.querySelector('#birthday_date');
// const date_release_form_modal = document.querySelector('#release_date');
// const picture_form_modal = document.querySelector('#picture');
// const cat_form_modal = document.querySelector('#categorie');
// const artist_form_modal = document.querySelector('#artist');
// const descriprion_form_modal = document.querySelector('#descriprion');

// const input_names = document.querySelector('.input_names');

// //Select inputs Element 
// const input_pictures = document.querySelector('.input_pictures');
// const select_categories = document.querySelector('.select_categories');
// const select_artists = document.querySelector('.select_artists');
// const input_release_date = document.querySelector('.input_release_date');
// const input_birthday_date = document.querySelector('.input_birthday_date');
// const input_description = document.querySelector('.input_description');


// //Function show & hide inputs forms
// function ArtistsShowHide(){
//   //Show
//     name_form_modal.style.display = "block";
//     date_birthday_form_modal.style.display = "block";
//     picture_form_modal.style.display = "block";
//     //add Atrribute name submit data
//     btn_create.setAttribute('name','add_artist');
//     btn_update.setAttribute('name','update_artist');
//     //inputs set required
//     input_names.setAttribute('required','');
//     input_birthday_date.setAttribute('required','');
//     input_pictures.setAttribute('required','');

//   //hide
//     cat_form_modal.style.display = "none";
//     artist_form_modal.style.display = "none";
//     descriprion_form_modal.style.display = "none";
//     date_release_form_modal.style.display = "none";
//     //inputs remove required
//     input_release_date.removeAttribute('required');
//     input_description.removeAttribute('required');
//     select_categories.removeAttribute('required');
//     select_artists.removeAttribute('required',);

// }
// function SongsShowHide(){
//   //Show
//     name_form_modal.style.display = "block";
//     picture_form_modal.style.display = "block";
//     date_release_form_modal.style.display = "block";
//     artist_form_modal.style.display = "block";
//     descriprion_form_modal.style.display = "block";
//     cat_form_modal.style.display = "block";
//     //add Atrribute name submit data
//     btn_create.setAttribute('name','add_song');
//     btn_update.setAttribute('name','update_song');
//     //inputs set required
//     input_names.setAttribute('required','');
//     input_pictures.setAttribute('required','');
//     input_release_date.setAttribute('required','');
//     input_description.setAttribute('required','');
//     select_categories.setAttribute('required','');
//     select_artists.setAttribute('required','');
    
//   //hide
//     date_birthday_form_modal.style.display = "none";
//     //inputs remove required
//     input_birthday_date.removeAttribute('required');
    
// }
// function GenersShowHide(){
//   //Show
//     name_form_modal.style.display = "block";
//     //add Atrribute name submit data
//     btn_create.setAttribute('name','add_gener');
//     btn_update.setAttribute('name','update_gener');
//     //inputs set required
//     input_names.setAttribute('required','');

//   //hide
//     picture_form_modal.style.display = "none";
//     date_release_form_modal.style.display = "none";
//     date_birthday_form_modal.style.display = "none";
//     cat_form_modal.style.display = "none";
//     artist_form_modal.style.display = "none";
//     descriprion_form_modal.style.display = "none";
//     //inputs remove required
    
//     select_categories.removeAttribute('required');
//     select_artists.removeAttribute('required');
//     input_release_date.removeAttribute('required');
//     input_birthday_date.removeAttribute('required');
//     input_description.removeAttribute('required');
// }
// //loop btn add show modal 
// let index = 1;
// btn_add_show_modal.forEach((item)=>{
//   item.addEventListener("click",()=>{
//     btn_update.style.display = "none";
//     btn_add.style.display = "block";
//     btn_create.style.display = "block";
//     form1.reset();

//     //loop namas inputs
//     // names_inpute.forEach(element => {
//     //   element.name = 'name_'+index++;
//     // });
//     // form1.name[index] = 's'+index++;
//   });
// });


// //Btn add Artists
// btn_add_show_modal[0].addEventListener("click",()=>{
//   ArtistsShowHide();
// });
// //Btn add Songs
// btn_add_show_modal[1].addEventListener("click",()=>{
//   SongsShowHide();
// });
// //Btn add Geners
// btn_add_show_modal[2].addEventListener("click",()=>{
//   GenersShowHide();
// });


// //loop btn edit show modal 
// btn_edit_show_modal.forEach((item)=>{
//   item.addEventListener("click",()=>{
//     btn_update.style.display = "block";
//     btn_add.style.display = "none";
//     btn_create.style.display = "none";
//   });
// });


// if(document.querySelector('#btn_edit_artist')){
//   //Btn add Artists
//   document.querySelector('#btn_edit_artist').addEventListener("click",()=>{
//     ArtistsShowHide();
//   });
// }
// if(document.querySelector('#btn_edit_song')){
//   //Btn add Songs
//   document.querySelector('#btn_edit_song').addEventListener("click",()=>{
//     SongsShowHide();
//   });
// }
// if(document.querySelector('#btn_edit_gener')){
//   //Btn add Geners
//   document.querySelector('#btn_edit_gener').addEventListener("click",()=>{
//     GenersShowHide();
//   });
// }


//Duplcate form Multiple
// let inputs_form_all_class;
// btn_add.addEventListener('click',()=>{
//   //Node form added
//   inputs_form_all_class = document.querySelectorAll('.inputs_form_all_class');
//   anotherdiv.append(inputs_form_id.cloneNode(true));
//   // names_inpute.forEach((element) => {  
//   //   element.name = 'name_'+index++;
//   // });
//   // form1.name[index] = 's'+index;
//   // index++;
// })


// //Remove data from model
// btn_close_all.forEach((item1)=>{
//   item1.addEventListener('click',()=>{
//     //loop all div is clone the form
//       inputs_form_all_class.forEach((item,count)=>{
        
//           item.remove();
//           // index=0;
        
//     });
//   })
// });

//++++++++++++++++++++++++++++++
//Select Element 
// icon btn edit
const icon_btn_edit_artists = document.querySelector('#btn_edit_artists');
const icon_btn_edit_songs = document.querySelector('#btn_edit_songs');
const icon_btn_edit_categories = document.querySelector('#btn_edit_categories');
// btn show modal
const btn_show_artists_add = document.querySelector('#btn_artist_add');
const btn_show_songs_add = document.querySelector('#btn_song_add');
const btn_show_categories_add = document.querySelector('#btn_categorie_add');
//btn close
const btn_close_all = document.querySelectorAll('.close');

//Forms
const form_artists = document.forms['form_artists'];
const form_songs = document.forms['form_songs'];
const form_categores = document.forms['form_categories'];

//==========================================================================
//Select Element btn Modal
//Artists btn form
const save_artist = document.querySelector('#save_artist');
const add_artist = document.querySelector('#add_artist');
const update_artist = document.querySelector('#update_artist');
//Duplicate Div the FORM
let nodes_artist = document.querySelector('.nodes_artist');
let div_to_coller_artist = document.createElement('div');
div_to_coller_artist.setAttribute('class','anotherdiv_artists');
add_artist.addEventListener('click',()=>{
    div_to_coller_artist.append(nodes_artist.cloneNode(true));
});

//___
//Songs btn form
const add_song = document.querySelector('#add_song');
const save_song = document.querySelector('#save_song');
const update_song = document.querySelector('#update_song');
//Duplicate Div the FORM
let div_to_coller_song = document.querySelector('.anotherdiv_songs');
let nodes_song = document.querySelector('.nodes_song');
// let div_song = document.createElement('div');
// div_song.setAttribute('class','div_songs');
add_song.addEventListener('click',()=>{
  // div_to_coller_song.append(div_song);
  div_to_coller_song.append(nodes_song.cloneNode(true));
});

//___
//Categores btn form
const add_categorie = document.querySelector('#add_categorie');
const save_categorie = document.querySelector('#save_categorie');
const update_categorie = document.querySelector('#update_categorie');
//Duplicate Div the FORM
let div_to_coller_categorie = document.querySelector('.anotherdiv_categories');
let nodes_categorie = document.querySelector('.nodes_categorie');
// let div_categorie = document.createElement('div');
// div_categorie.setAttribute('class','div_categorie');
add_categorie.addEventListener('click',()=>{
  // div_to_coller_categorie.append(div_categorie);
  div_to_coller_categorie.append(nodes_categorie.cloneNode(true));
});
//============================
// show and hidden btn modal
btn_show_artists_add.addEventListener('click',()=>{
  add_artist.style.display = "block";
  save_artist.style.display = "block";
  update_artist.style.display = "none";
});
icon_btn_edit_artists.addEventListener('click',()=>{
  update_artist.style.display = "block";
  save_artist.style.display = "none";
  add_artist.style.display = "none";
})

//___
// show and hidden btn modal
btn_show_songs_add.addEventListener('click',()=>{
  add_song.style.display = "block";
  save_song.style.display = "block";
  update_song.style.display = "none";
});
icon_btn_edit_songs.addEventListener('click',()=>{
  update_song.style.display = "block";
  save_song.style.display = "none";
  add_song.style.display = "none";
})

//___
// show and hidden btn modal
btn_show_categories_add.addEventListener('click',()=>{
  add_categorie.style.display = "block";
  save_categorie.style.display = "block";
  update_categorie.style.display = "none";
});
icon_btn_edit_categories.addEventListener('click',()=>{
  update_categorie.style.display = "block";
  save_categorie.style.display = "none";
  add_categorie.style.display = "none";
})

//__
//loop remove inputs if clicked close
btn_close_all.forEach((item)=>{
  item.addEventListener('click',()=>{
    // // div_to_coller_categorie.remove();
    // // div_artist.remove();
    // // div_song.remove();
    // // div_categorie.remove();
    // console.log(div_song_ready);
    // // div_song_ready.forEach((s)=>{
      
    // // })
    // nodes_artist.parentNode.removeChild(div_to_coller_artist);
  })
});