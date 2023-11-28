import React, { Suspense } from 'react';

const Hero = React.lazy(() => import('../components/Hero'));
const Navbar = React.lazy(() => import('../components/Navbar'));

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
