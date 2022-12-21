import "./bootstrap";
import "../fonts/fontawesome/css/all.min.css";
import "select2/dist/css/select2.min.css";
import select2 from "select2";
import Alpine from "alpinejs";
import axios from "axios";

// config axios
window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

window.Alpine = Alpine;

// hook up jquery to select2
select2($);

// question page js
import './pages/question.js';



