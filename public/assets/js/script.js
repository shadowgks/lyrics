// DATATABLE
$(document).ready(function() {
    $('#example1,#example2,#example3,#example4,#example6').DataTable({
      responsive: true
    }).columns.adjust().responsive.recalc();
});

//++++++++++++++++++++++++++++++
//Optimaze Modal form
//Select Elements

// btn show modal
const btn_show_artists_add = document.querySelector('#btn_artist_add');
const btn_show_songs_add = document.querySelector('#btn_song_add');
const btn_show_categories_add = document.querySelector('#btn_categorie_add');
const btn_show_albums_add = document.querySelector('#btn_albums_add');
//btn close
const btn_close_all = document.querySelectorAll('.close');

//Forms
const form_artists = document.forms['form_artists'];
const form_songs = document.forms['form_songs'];
const form_categores = document.forms['form_categories'];
const form_albums = document.forms['form_albums'];
const form_delete = document.forms['form_delete'];

//divs side form created
const div_artists = document.querySelector('.div_artists');
const div_songs = document.querySelector('.div_songs');
const div_categories = document.querySelector('.div_categories');
const div_albums = document.querySelector('.div_albums');

//Global VAR Switch 
var opened_modal;

//==========================================================================
//Select Element btn Modal
//Artists btn form
const save_artist = document.querySelector('#save_artist');
const add_artist = document.querySelector('#add_artist');
const update_artist = document.querySelector('#update_artist');
//Duplicate Div the FORM
let nodes_artist = document.querySelector('.nodes_artist');
let div_to_coller_artist;
add_artist.addEventListener('click',()=>{
    div_to_coller_artist.append(nodes_artist.cloneNode(true));
});

//___
//Songs btn form
const add_song = document.querySelector('#add_song');
const save_song = document.querySelector('#save_song');
const update_song = document.querySelector('#update_song');
//Duplicate Div the FORM
let nodes_song = document.querySelector('.nodes_song');
let div_to_coller_song;
add_song.addEventListener('click',()=>{
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
add_categorie.addEventListener('click',()=>{
  div_to_coller_categorie.append(nodes_categorie.cloneNode(true));
});

//___
//Albums btn form
const add_album = document.querySelector('#add_album');
const save_album = document.querySelector('#save_album');
const update_album = document.querySelector('#update_album');
//Duplicate Div the FORM
let div_to_coller_album = document.querySelector('.anotherdiv_albums');
let nodes_album = document.querySelector('.nodes_album');
add_album.addEventListener('click',()=>{
  div_to_coller_album.append(nodes_album.cloneNode(true));
});

//============================
// show and hidden btn modal artists
btn_show_artists_add.addEventListener('click',()=>{
  //Create another div
  div_to_coller_artist = document.createElement('div');
  div_to_coller_artist.setAttribute('class','anotherdiv_artists');
  div_artists.append(div_to_coller_artist);

  opened_modal = 'artists';

  //show and hide
  add_artist.style.display = "block";
  save_artist.style.display = "block";
  update_artist.style.display = "none";

  //reset form
  form_artists.reset()
});

function icon_btn_edit_artists(id,name,date_birthday){
  update_artist.style.display = "block";
  save_artist.style.display = "none";
  add_artist.style.display = "none";

  form_artists['id'].value = id; 
  form_artists['name[]'].value = name;
  form_artists['birthday_date[]'].value = date_birthday;
}
//delete
function deleteArtist($id){
  document.querySelector('#alert_delete').removeAttribute("name");
  document.querySelector('#alert_delete').setAttribute("name","delete_artist");

  form_delete['id'].value = $id;
}

//___
// show and hidden btn modal songs
btn_show_songs_add.addEventListener('click',()=>{
  //Create another div
  div_to_coller_song = document.createElement('div');
  div_to_coller_song.setAttribute('class','anotherdiv_songs');
  div_songs.append(div_to_coller_song);
  
  opened_modal = 'songs';

  //show and hide
  add_song.style.display = "block";
  save_song.style.display = "block";
  update_song.style.display = "none";

  //reset form
  form_songs.reset();
});

function icon_btn_edit_songs(id,name,release_date,lyrics,id_artist,id_cat,id_album){
  update_song.style.display = "block";
  save_song.style.display = "none";
  add_song.style.display = "none";

  form_songs['id'].value = id; 
  form_songs['name[]'].value = name;
  form_songs['release_date[]'].value = release_date;
  form_songs['lyrics[]'].value = lyrics;
  form_songs['artist[]'].value = id_artist;
  form_songs['categorie[]'].value = id_cat;
  form_songs['album[]'].value = id_album;
}
//delete
function deleteSong($id){
  document.querySelector('#alert_delete').removeAttribute("name");
  document.querySelector('#alert_delete').setAttribute("name","delete_song");

  form_delete['id'].value = $id;
}

//___
// show and hidden btn modal categories
btn_show_categories_add.addEventListener('click',()=>{
  //Create another div
  div_to_coller_categorie = document.createElement('div');
  div_to_coller_categorie.setAttribute('class','anotherdiv_categorie');
  div_categories.append(div_to_coller_categorie);
  
  opened_modal = 'categories';

  //show and hide
  add_categorie.style.display = "block";
  save_categorie.style.display = "block";
  update_categorie.style.display = "none";

  //reset form
  form_categores.reset();

});
//update
function icon_btn_edit_categories(id,name){
  update_categorie.style.display = "block";
  save_categorie.style.display = "none";
  add_categorie.style.display = "none";

  form_categores['id'].value = id; 
  form_categores['name[]'].value = name;
}
//delete
function deleteCategorie($id){
  document.querySelector('#alert_delete').removeAttribute("name");
  document.querySelector('#alert_delete').setAttribute("name","delete_categorie");

  form_delete['id'].value = $id;
}

//___
// show and hidden btn modal albums
btn_show_albums_add.addEventListener('click',()=>{
  //Create another div
  div_to_coller_album = document.createElement('div');
  div_to_coller_album.setAttribute('class','anotherdiv_album');
  div_albums.append(div_to_coller_album);
  
  opened_modal = 'albums';

  //show and hide
  add_album.style.display = "block";
  save_album.style.display = "block";
  update_album.style.display = "none";

  //reset form
  form_albums.reset()
});
//edite
function icon_btn_edit_albums(id,name){
  update_album.style.display = "block";
  save_album.style.display = "none";
  add_album.style.display = "none";

  form_albums['id'].value = id; 
  form_albums['name[]'].value = name;
}
//delete
function deleteAlbum($id){
  document.querySelector('#alert_delete').removeAttribute("name");
  document.querySelector('#alert_delete').setAttribute("name","delete_album");

  form_delete['id'].value = $id;
}

//__
//loop remove inputs if clicked close
btn_close_all.forEach((item)=>{
  item.addEventListener('click',()=>{
    switch (opened_modal) {
      case 'artists':
        div_to_coller_artist.remove();
        break;
      case 'songs':
        div_to_coller_song.remove();
        break;
      case 'categories':
        div_to_coller_categorie.remove();
        break;
      case 'albums':
        div_to_coller_album.remove();
        break;
      default:
        break;
    }
  })
});

