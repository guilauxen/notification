import { api } from "../lib/axios";

export const getNotifications = async () => {
    
    const response = await api.get('/notifications');

    if (response.data.status_code === 200) {
        return response.data.data;
    }

    throw new Error('Error! Error to get Notifications');
}