const app = new Vue({
    el: '#app',
    data: {
        albums: [],
    },
    created() {
        axios.get('http://localhost:8888/php-ajax-dischi/server/api.php')
        .then((response) => {
            this.albums = response.data
        }) 
    },
    computed: {
        takeAllGenre() {
            let allGenre = []
            this.albums.forEach(album => {
                if (!allGenre.includes(album.genre)) {
                    allGenre.push(album.genre)
                }
            });
            return allGenre
        }
    }
})