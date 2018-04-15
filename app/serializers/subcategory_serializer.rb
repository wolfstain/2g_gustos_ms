class SubcategorySerializer < ActiveModel::Serializer
  attributes :id, :name, :description, :category_id, :created_at, :updated_at
  belongs_to :category
end
