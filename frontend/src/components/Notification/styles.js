import styled from 'styled-components';

export const NotificationContainer = styled.main`
    display: flex;
    justify-content: center; 
    align-items: center;     
    width: 100%;
    position: relative;
    padding-top: 2rem;
    color: ${props => props.theme.black};
`

export const NotificationForm = styled.article`
    background: ${props => props.theme['gray-100']};
    width: 50rem;
    height: 100%;
    border-radius: 5px;
    padding: 2rem;

    form {
        width: 100%;
        display: inline-flex;
        justify-content: space-around;
        align-items: center;
        gap: 1rem;
    }

    select {
        height: 2.4rem;
        width: 17rem;
        background: ${props => props.theme['gray-100']};
        border: 1px solid ${props => props.theme['black']};
        border-radius: 4px;
    }

    textarea {
        width: 25rem;
        height: 1.4rem;
        background: ${props => props.theme['gray-100']};
        border: 1px solid ${props => props.theme['black']};
        border-radius: 4px;
        padding: 0.5rem;
    }
    
    button {
        height: 2.4rem;
        background: ${props => props.theme['gray-100']};
        border: 1px solid ${props => props.theme['black']};
        border-radius: 4px;
        cursor: pointer;
    }

    p {
        padding-top: 2rem;
        font-weight: bold;
    }

    table {
        padding-top: 0.5rem;
        width: 100%;
        border-collapse: collapse;

        tr {
            border-bottom: 1px solid ${props => props.theme['black']};
        }
        
        td, th {
            border: none;
            padding: 0.5rem;
            text-align: left;
        }
    }
`