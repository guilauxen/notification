import { ThemeProvider } from 'styled-components';
import { GlobalStyle } from './styles/global';
import { defaultTheme } from './styles/themes/default';
import { Notification } from './components/Notification';
import { Header } from './components/Header';

export function App() {
  return (
    <ThemeProvider theme={defaultTheme}>
        <GlobalStyle />
        <Header />
        <Notification />
    </ThemeProvider>
  );
}
