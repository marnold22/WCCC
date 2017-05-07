// class GoogleMapsQuery{
//   constructor(element){
//     this.element = element;
//     this.maps = $(this.element).find('.google-map-query-item');
//     this.buttons = $(this.element).find('.link-button');
//     this.setupHandlers();
//     // this.displayMap(0);
//   }
//
//   setupHandlers(){
//     $(this.buttons).click((event)=>{
//       this.handleClick(event);
//     });
//   }
//
//   handleClick(event){
//     event.preventDefault();
//     let index = $(event.target).attr('href');
//     index = parseInt(index);
//     if(index != null){
//       this.displayMap(index);
//     }
//   }
//
//   displayMap(index){
//     if(index >= 0 && index < this.maps.length){
//       $(this.maps).removeClass('active');
//       $(this.maps[index]).addClass('active');
//     }
//   }
//
// }
//
// $(document).ready(()=>{
//   let elements = $('.google-maps-query');
//   for(let i = 0; i < elements.length; i++){
//     new GoogleMapsQuery(elements[i]);
//   }
// });
