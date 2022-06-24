const app = new Vue({
    el: '#app',
    data: {
        albumsSelected: [],
        albums: [],
        selectedGenre: '',
    },
    created() {
        axios.get('http://localhost:8888/php-ajax-dischi/server/api.php')
        .then((response) => {
            this.albumsSelected = response.data
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
    },
    methods: {
        changeGenre() {
            axios.get('http://localhost:8888/php-ajax-dischi/server/api.php', {
                params: {
                    genre: this.selectedGenre,
                }
            })
            .then((response) => {
                this.albumsSelected = response.data
            })
            console.log('ciao')
        }
    }
})