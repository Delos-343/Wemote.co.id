import '@fontsource/sirin-stencil';
import '@fontsource/kaushan-script';

import { createGlobalStyle } from 'styled-components';

const GlobalStyles = createGlobalStyle`

${'' /* *{
    outline: 1px solid red !important;
}  */}

body {
   margin: 0;
   font-family: sans-serif;
   color: #354358;
}

/*******************************
  Hero background
********************************/
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

/*******************************
  Central icon and text
********************************/
.icon-holder {
  position: relative;
  z-index: 1;

  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;

  background-color: rgba(255, 253, 247, 0.5);
  box-shadow: 0 0 10px 10px rgba(255, 253, 247, 0.5);
  border-radius: 3rem;
  padding: 2rem;
  height: 19rem;
}

.icon-holder__icon {
  position: absolute;
  top: 0;
  width: 16rem;
}

.icon-holder__icon img {
  max-width: 100%;
}

.icon-holder__text {
  font-size: 4rem;
  font-family: Arial, Helvetica, sans-serif;
  position: absolute;
  bottom: 0;
}

/*******************************
  Animal images
********************************/
.watch-image {
  position: absolute;
}

.watch-image img {
  max-width: 100%;
}

.watch-image__one {
  left: -7rem;
  width: 40vw;
  max-width: 550px;
}

.watch-image__two {
  top: 0;
  right: 0;
  width: 40vw;
  max-width: 390px;
}

.watch-image__three {
  bottom: 0;
  right: 0;
  width: 40vw;
  max-width: 290px;
}

/*******************************
  Responsive changes
********************************/
@media screen and (max-width: 876px) {
  .hero {
    height: 70vh;
  }

  /*******************************
    Icon and text cover
  ********************************/
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

  /*******************************
    Reposition images
  ********************************/
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