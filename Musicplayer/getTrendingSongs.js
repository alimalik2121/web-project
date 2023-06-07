$(document).ready(function(){
    $.ajax({
     type: "GET" ,
     url: "trendingsongs.xml" ,
     dataType: "xml" ,
     success: function(xml) {
        $(xml).find('tsongs').each(function() {
            var title= $(this).find('title').text();
            var artist = $(this).find('artist').text();
            var source = $(this).find('source').text();
            
            $('#trending-songs').append(
                `<div class='tsongs'>
                    <audio controls>
                        <source src="./songs/${source}">
                    </audio>
                    <h3>${title}</h3>
                    <p>${artist}</p>
                </div>`
            );
        });
     }       
 });
 });