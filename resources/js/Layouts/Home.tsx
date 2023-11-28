import React, { Suspense } from 'react';

import { Hero, Navbar } from '../Components';

const Home = () => {
  return (
    <section className="relative min-h-screen overflow-hidden" id="home">
      <Suspense fallback={<></>}>
        <Navbar />
        <Hero />
      </Suspense>
    </section>
  );
};

export default Home;
