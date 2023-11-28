import { motion } from 'framer-motion';
import React, { useState } from 'react';
import { useLocomotiveScroll } from 'react-locomotive-scroll';
import { Link } from 'react-router-dom';

const Navbar = () => {
  const [click, setClick] = useState(false);
  const { scroll } = useLocomotiveScroll();

  const handleScroll = (id) => {
    let elem = document.querySelector(id);
    setClick(!click);
    scroll.scrollTo(elem, {
      offset: '-100',
      duration: '2000',
      easing: [0.25, 0.0, 0.35, 1.0],
    });
  };

  return (
    <motion.div
      className={`absolute ${
        click ? 'top-0' : `-${/* replace with your theme.navHeight value */}`
      } transition-all duration-300 z-10 w-full flex justify-center items-center ${
        click ? '' : 'md:top-calc(-50vh - 4rem)' /* replace with your media query value */
      }`}
    >
      <motion.ul className="relative h-/* replace with your theme.navHeight */ bg-body text-text flex justify-around items-center list-none w-full px-10 md:flex-col md:px-0 md:h-/* replace with your media query value */">
        <li
          className="bg-rgba-text-0.7 text-body w-15rem h-2.5rem border-none outline-none absolute top-full left-1/2 transform -translate-x-1/2 font-semibold cursor-pointer flex justify-center items-center transition-all duration-300 md:w-10rem md:h-2rem"
          onClick={() => setClick(!click)}
        >
          <span> MENU </span>
        </li>
        <motion.li
          className="uppercase text-text md:flex-col md:py-0.5 md:px-0"
          whileHover={{ scale: 1.1, y: -5 }}
          whileTap={{ scale: 0.9, y: 0 }}
          onClick={() => handleScroll('#home')}
        >
          <Link to="/"> Home </Link>
        </motion.li>
        <motion.li
          className="uppercase text-text md:flex-col md:py-0.5 md:px-0"
          whileHover={{ scale: 1.1, y: -5 }}
          whileTap={{ scale: 0.9, y: 0 }}
          onClick={() => handleScroll('#home')}
        >
          <Link to="/"> Our Team </Link>
        </motion.li>
      </motion.ul>
    </motion.div>
  );
};

export default Navbar;
