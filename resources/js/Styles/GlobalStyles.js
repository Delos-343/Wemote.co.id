import '@fontsource/sirin-stencil';
import '@fontsource/kaushan-script';

import { createGlobalStyle } from 'styled-components';

const GlobalStyles = createGlobalStyle`

${'' /* *{
    outline: 1px solid red !important;
}  */}

body {
  overflow: hidden;
  margin: 0;
  font-family: 'Sirin Stencil';
  color: #354358;
}

.hero {
  position: relative;

  display: flex;
  align-items: center;
  justify-content: center;

  height: 1200vh;
  min-height: 35rem;
  background-color: #0c0c0c;

  overflow: hidden;
}

.icon-holder {
  position: relative;
  z-index: 1;

  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  
  padding: 2rem;
  height: 100%;
  width: 100%;
}

.icon-holder__icon {
  width: 250px;
}

.icon-holder__icon img {
  max-width: 100%;
}

.icon-holder__text {
  margin-top: 3rem;
  width: 100%;
  font-size: 2.5rem;
  font-family: 'Kaushan Script';
  text-align: center;
}

.watch-image {
  position: absolute;
}

.watch-image img {
  max-width: 100%;
}

.watch-image__one {
  left: 7rem;
  width: 50vw;
  max-width: 250px;
}

.watch-image__two {
  top: 5rem;
  right: 14rem;
  width: 20vw;
  max-width: 180px;
}

.watch-image__three {
  bottom: 3rem;
  right: 16rem;
  width: 30vw;
  max-width: 90px;
}

@media screen and (max-width: 876px) {
  .hero {
    height: 70vh;
  }

  .icon-holder {
    width: 100%;
    height: 100%;
    justify-content: flex-end;
  }

  .icon-holder__icon {
    top: auto;
    bottom: 7rem;
    max-width: 10rem;
  }

  .watch-image__one {
    top: -5rem;
    width: 80vw;
  }

  .watch-image__two {
    right: 0rem;
  }

  .watch-image__three {
    top: 18rem;
    bottom: auto;
    right: -5rem;
    width: 50vw;
  }
}
`;

export default GlobalStyles;