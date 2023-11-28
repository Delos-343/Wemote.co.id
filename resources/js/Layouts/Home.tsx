import React, { Suspense } from 'react';

const CoverVideo = React.lazy(() => import('../components/CoverVideo'));
const Navbar = React.lazy(() => import('../components/Navbar'));

const Home = () => {
  return (
    <section className="relative min-h-screen overflow-hidden" id="home">
      <Suspense fallback={<></>}>
        <Navbar />
        <CoverVideo />
      </Suspense>
    </section>
  );
};

export default Home;
