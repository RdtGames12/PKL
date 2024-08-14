<template>
  <div>
    <search @update-query="fetchMovie"></search>
    <div class="container">
    <div v-if="movies.length" class="d-flex flex-wrap justify-content-between">
      <div
        v-for="movie in movies"
        :key="movie.imdbID"
        class="col-md-4 mb-4 px-2"
      >
        <div class="card shadow-sm">
          <div class="card-header">
            <img
              class="card-img-top"
              :src="movie.Poster"
              alt="Card image cap"
            />
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ movie.Title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">
              Year: {{ movie.Year }}
            </h6>
          </div>
        </div>
      </div>
    </div>

    <div v-else>
      <p>No results found</p>
    </div>
  </div>
  </div>
</template>

<script>
import axios from "axios";
import search from "./components/search.vue";

export default {
  components: {
    search,
  },
  data() {
    return {
      movies: [],
    };
  },
  methods: {
    fetchMovie(query) {
      if (query) {
        axios
          .get(`http://www.omdbapi.com?apikey=184a9527&s=${query}`)
          .then((response) => {
            if (response.data.Search) {
              this.movies = response.data.Search;
            } else {
              this.movies = [];
            }
          })
          .catch((error) => {
            console.error(error);
            this.movies = [];
          });
      } else {
        this.movies = [];
      }
    },
  },
};
</script>
