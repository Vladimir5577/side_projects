import {
	List,
	Datagrid,
	TextField,
	DateField,
	EditButton,
	DeleteButton,
} from 'react-admin';

const PostList = (props) => {
	return (
		<List {...props}>
			<Datagrid>
				<TextField source='id' />
				<TextField source='title' />
				<DateField source='publishedAt' />
				<EditButton source='/posts' />
				<DeleteButton source='/posts' />
			</Datagrid>
		</List>
	);	
};

export default PostList;