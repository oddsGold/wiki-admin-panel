import PageBreadcrumb from "../../components/common/PageBreadCrumb.jsx";
import PageMeta from "../../components/common/PageMeta.jsx";
import ComponentCard from "../../components/common/ComponentCard.jsx";
import {useLocation, useNavigate} from "react-router-dom";
import {acceptHandler, errorHandler} from "../../components/utils/toastHandler.js";
import {useRef} from "react";
import FaqForm from "../../components/form/page-forms/FaqForm.jsx";
import {useCreateVideoMutation} from "../../redux/video/videoApiSlice.js";
import VideoForm from "../../components/form/page-forms/VideoForm.jsx";

export default function CreateVideoPage() {
    const navigate = useNavigate();
    const location = useLocation();
    const previousPath = useRef(location.state?.from?.pathname ?? '/admin/faqs');

    const [createVideo, {isLoading}] = useCreateVideoMutation();

    const handleSubmit = async (values) => {
        try {
            await createVideo({data: values}).unwrap();
            navigate('/admin/videos');
            acceptHandler("Video успішно доданий");
        } catch (err) {
            errorHandler(err.data.message);
        }
    };

    return (
        <>
            <PageMeta
                title="Create new faq"
                description="Create user faq"
            />
            <PageBreadcrumb
                breadcrumbs={[
                    { title: "Home", to: "/admin/dashboard" },
                    { title: "Video", to: "/admin/videos"},
                    { title: "Create video"},
                ]}
            />
            <div className="space-y-6">
                <ComponentCard title="Create video">
                    <VideoForm
                        defaultCurrent={{
                            title: '',
                            url: ''
                        }}
                        handleSubmit={handleSubmit}
                        backLinkPath={previousPath}
                    />
                </ComponentCard>
            </div>
        </>
    );
}
