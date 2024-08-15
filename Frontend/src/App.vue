
<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";
import search from "./components/search.vue";

const movies = ref([]);

const fetchMovie = (query) => {
  if (query) {
    axios
      .get(`http://www.omdbapi.com?apikey=184a9527&s=${query}`)
      .then((response) => {
        if (response.data.Search) {
          movies.value = response.data.Search;
        } else {
          movies.value = [];
        }
      })
      .catch((error) => {
        console.error(error);
        movies.value = [];
      });
  } else {
    movies.value = [];
  }
};


onMounted( async () => {
  fetchMovie("batman");
});

</script>

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

