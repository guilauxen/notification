import React, { useEffect, useState } from 'react'
import { NotificationContainer, NotificationForm } from './styles'
import { api } from '../../lib/axios';
import { getNotifications } from '../../data/Notifications';
import { getCategories } from '../../data/Categories';
import { format } from 'date-fns';

export function Notification() {

    const [categories, setCategories] = useState([]);
    const [notifications, setNotifications] = useState([]);

    useEffect(() => {
        getCategories()
            .then(resultCategories => {
                setCategories(resultCategories);
            })
            .catch(error => {
                setCategories([]);
                console.log('Error to get Categories');
            });

        getAllNotifications();
    }, []);

    function getAllNotifications() {
        getNotifications()
            .then(resultNotifications => {
                setNotifications(resultNotifications);
            })
            .catch(error => {
                setNotifications([]);
                console.log('Error to get Notifications');
            });
    }
    
    async function handleSubmit(event) {
        event.preventDefault();

        const category = parseInt(event.target.category.value);
        const message = event.target.message.value;

        try {
            const response = await api.post('/send-message', {
                category_id: category,
                message: message,
            });

            if (response.status === 200) {
                getAllNotifications();
                alert('Messages are sent with Success');
            } else {
                alert('Error to send Messages: ' + response.data.error.message);
            }
        } catch (error) {
            alert('Error to send Messages: ' + error.message);
        }
    }

    const formatDate = (dateString) => {
        return format(new Date(dateString), 'dd/MM/yyyy HH:mm:ss');
    };


    return (
        <NotificationContainer>
            <NotificationForm>
                <form onSubmit={handleSubmit}>
                    <select id='category' required>
                        <option value={''}>Select Category...</option>
                        {categories && categories.map(category => (
                            <option key={category.id} value={category.id}>
                                {category.category}
                            </option>
                        ))}
                        {/* <option value={1}>Movies</option>
                        <option value={2}>Finance</option>
                        <option value={3}>Sports</option> */}
                    </select>
                    <textarea id='message' placeholder={'Write a Message'} required/>
                    <button type="submit">
                        Send
                    </button>
                </form>
                
                <p>Logs:</p>
                <table>
                    <tr>
                        <th>Id</th>
                        <th>User</th>
                        <th>Message</th>
                        <th>Channel</th>
                        <th>Delivered at</th>
                    </tr>
                    {notifications && notifications.map(notification => (
                        <tr key={notification.id}>
                            <td>{notification.id}</td>
                            <td>{notification.user}</td>
                            <td>{notification.message}</td>
                            <td>{notification.channels}</td>
                            <td>{formatDate(notification.created_at)}</td>
                        </tr>
                    ))}
                </table>
                
            </NotificationForm>
        </NotificationContainer>
        
    )
}