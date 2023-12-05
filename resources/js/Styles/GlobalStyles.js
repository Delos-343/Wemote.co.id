import '@fontsource/sirin-stencil';
import '@fontsource/kaushan-script';

import { createGlobalStyle } from 'styled-components';

const GlobalStyles = createGlobalStyle`

${'' /* *{
    outline: 1px solid red !important;
}  */}

body {
   font-family: sans-serif;
   color: #354358;
}
`;

export default GlobalStyles;