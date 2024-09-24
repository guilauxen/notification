import { createGlobalStyle } from 'styled-components';

export const GlobalStyle = createGlobalStyle`

    :focus {
        outline: 0;
    }

    body {
        font-family: ${props => props.theme.font}, sans-serif;
        background-color: ${props => props.theme['black-100']};
        color: ${props => props.theme.white};
        -webkit-font-smoothing: antialiased;
    }

`