import { api } from "../lib/axios";

export const getCategories = async () => {
    
    const response = await api.get('/categories');

    if (response.data.status_code === 200) {
        return response.data.data;
    }

    throw new Error('Error! Error to get Categories');
}