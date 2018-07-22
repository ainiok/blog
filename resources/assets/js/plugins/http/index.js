import axios from 'axios'
import {apiUrl} from 'config/base'

export const http = axios.create({
    baseURL: apiUrl,
})