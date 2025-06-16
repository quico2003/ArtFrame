
import { useContext, useState } from "react";
import { StringsContext } from "../../Context/strings.context";
import HomeLanding from "./Components/HomeLanding/HomeLanding";
import Footer from "./Footer/Footer";
import NavBar from "./Navbar/NavBar";
import FeaturesLanding from "./Components/FeaturesLanding/FeaturesLanding";
import ProductsLanding from "./Components/ProductsLanding/ProductsLanding";


const LandingPage = () => {

    const { strings } = useContext(StringsContext);
    const ViewStrings = strings.LandingPage.home;


    return (
        <div className="scroll-section" style={{ height: "100svh", overflowY: "auto", textAlign: "center"}}>
            <NavBar />
            <HomeLanding text={ViewStrings.text} />
            <ProductsLanding />
            <div className="container">
                <FeaturesLanding />
            </div>
            <Footer />
        </div>
    )

}
export default LandingPage;