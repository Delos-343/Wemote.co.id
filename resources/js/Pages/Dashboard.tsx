import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import React from 'react';
import { Head } from '@inertiajs/react';
import { PageProps } from '@/types';

export const Container = ({ children } : { children: any }) => {
  return (
    <div className="container mx-auto px-4 py-8 w-full"> {children} </div>
  );
};

export const Card: React.FC<{ additionalClasses?: string }> = ({
  additionalClasses = '',
  children,
}) => {
  return (
    <div className={`bg-gray-100 rounded-lg shadow-md mb-8 ${additionalClasses}`}>
      <div className="p-4 text-justify"> {children} </div>
    </div>
  );
};

export const CEOCard = ({ children } : { children: any }) => {
  return (
    <Card additionalClasses="italic text-gray-600"> {children} </Card>
  );
};

export default function Dashboard({ auth }: PageProps) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>}
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                        <div className="p-6 text-gray-900 text-center">
                            You're logged in!
                        </div>
                    </div>
                    <Container>
                        <div className="mb-8">
                            <div className="p-4 text-justify">
                                <p className="text-gray-800 text-center font-semibold text-4xl">
                                    Welcome to Grand Teiko, The largest watch reseller in Asia
                                </p>
                            </div>
                        </div>
                        <br />
                        <Card>
                            <p className="text-gray-800">
                                Grand Teiko is a watch reseller privately owned company with more than 200 years of experience in watch reselling. We sell watches on the best price possible. Our rich heritage spans over two centuries, steeped in the artistry and precision of horology. Our legacy of watch reselling embodies a commitment to excellence and a profound understanding of timepieces that has been passed down through generations. With a keen eye for quality and craftsmanship, we curate a diverse collection of watches, offering our clientele an unparalleled selection of iconic brands and rare finds.
                            </p>
                            <br />
                            <p className="text-gray-800">
                                Our dedication to providing the best prices reflects our ethos of making exceptional timepieces accessible to enthusiasts and collectors worldwide. At Grand Teiko, our passion for watches drives us to continually exceed expectations, ensuring that each customer receives not just a timepiece but an experience that resonates with our legacy of expertise and integrity.
                            </p>
                        </Card>
                        <CEOCard>
                            <p className="text-gray-800 text-center">
                                Hans Edward Bloch - CEO of Grand Teiko
                            </p>
                        </CEOCard>
                    </Container>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
