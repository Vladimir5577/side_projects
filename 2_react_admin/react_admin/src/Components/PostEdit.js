import { Edit, SimpleForm, TextInput, DateInput } from 'react-admin';

const PostEdit = (props) => {
	return (
		<Edit title='Edit a Post' { ...props } >
			<SimpleForm>
				<TextInput disabled source='id' />
				<TextInput source='title' />
				<TextInput multiline source='body' />
				<DateInput label='Publilshed' source='publishedAt' />
			</SimpleForm>
		</Edit>
	);
};

export default PostEdit;